<?php
class OrdersController extends AppController {
	public function add()
    {
    	if ($this->request->is('post')) {
            $this->Order->create();
            if( $this->Order->save($this->request->data) )
            {
            	return $this->redirect(array('action' => 'add'));
            }
        }
        else
        {
        	$meals = $this->Order->Meal->find('list');
	   		$this->set(compact('meals'));
	    	
	    	$users = $this->Order->User->find('list');
	    	$this->set(compact('users'));
		}
    }
    
    //first step of order creation - select the meal
    public function mealAdd( $mealId = null )
    {
    	if( $mealId == null )
    	{
    		// list meals to select one
    		$meals = $this->Order->Meal->find('all');
    		$this->set('meals', $meals);
    	}
    	else
    	{    		
    		// save selection and go to the ingredients selection
    		$orderReqRes = $this->Order->Meal->findById( $mealId );
    		
    		if( $this->Session->check('order') )
    		{
    			$order = $this->Session->read('order');
    		}
    		else
    		{
    			$order  = array();
    		}
    		
    		$ordinal = 0;
    		while( $ordinal < 100 )
    		{
    			if( array_key_exists ( $ordinal, $order ) == false )
    			{
    				break;
    			}
    			$ordinal++;
    		}
    		
    		$order[$ordinal] = array();
    		$order[$ordinal]['count'] = 0;
    		$order[$ordinal]['id'] = $mealId;

			foreach( $orderReqRes['MealComposition'] as $ingredient )
    		{
    			$order[$ordinal]['ingredients'][$ingredient['ingredient_id']] = $ingredient['ingredient_amount'];
    		}
    		
			$this->Session->write('order', $order);
			
			return $this->redirect(array('action' => 'ingredientsSelect'));
    	}
    }
    
    public function mealRemove( $mealId = null )
    {
		$order = $this->Session->read('order');
    	unset( $order[ $mealId ] );
    	$this->Session->write('order', $order);
    	return $this->redirect(array('action' => 'ingredientsSelect'));
    }
    
    // add ingredients for selected meals
    public function ingredientsSelect()
    {
    	$order = $this->Session->read('order');
    	$orderForView = array();
    	$ingredientsForView = $this->Order->Meal->MealComposition->Ingredient->find( 'all' );
    	
    	// get meals details for view
    	foreach( $order as $ordinal => $meal )
    	{
    		$mealInfo = $this->Order->Meal->findById( $meal['id'] );
    		$orderForView[ $ordinal ]['name'] = $mealInfo['Meal']['name'];
    		
    		foreach( $meal['ingredients'] as $ingredientId => $ingredientAmount )
    		{
    			$ingredientInfo = $this->Order->Meal->MealComposition->Ingredient->findById( $ingredientId );
    			$orderForView[ $ordinal ]['ingredients'][$ingredientId]['name'] = $ingredientInfo['Ingredient']['name'];
    			$orderForView[ $ordinal ]['ingredients'][$ingredientId]['amount'] = $ingredientAmount;
    		}
    	}
    	
    	$this->set( 'order', $orderForView );
    	$this->set( 'ingredients', $ingredientsForView );
    }
    
    public function ingredientAmountIncrease( $mealOrdinal = null, $ingredientId = null )
    {
    	if( $mealOrdinal == null || $ingredientId == null )
    	{
    		return $this->redirect(array('action' => 'ingredientsSelect'));
		}
		else
		{
	    	$order = $this->Session->read('order');
	    	$order[ $mealOrdinal ]['ingredients'][ $ingredientId ] += 1;
	    	$this->Session->write('order', $order);
	    	return $this->redirect(array('action' => 'ingredientsSelect'));
		}
    }
    
    public function ingredientAmountDecrease( $mealOrdinal, $ingredientId )
    {
    	$order = $this->Session->read('order');
    	if( $mealOrdinal == null || $ingredientId == null || $order[ $mealOrdinal ]['ingredients'][ $ingredientId ] == 0 )
    	{
    		return $this->redirect(array('action' => 'ingredientsSelect'));
		}
		else
		{
			if( $order[ $mealOrdinal ]['ingredients'][ $ingredientId ] == 1 )
			{
				unset( $order[ $mealOrdinal ]['ingredients'][ $ingredientId ] );
			}
			else
			{
		    	$order[ $mealOrdinal ]['ingredients'][ $ingredientId ] -= 1;	
		    }
		    $this->Session->write('order', $order);
	    	return $this->redirect(array('action' => 'ingredientsSelect'));
		}		
    }
    
    public function ingredientAdd( $mealOrdinal, $ingredientId )
    {
    	$order = $this->Session->read('order');
  		if( array_key_exists ( $ingredientId, $order[ $mealOrdinal ]['ingredients'] ) == false )
  		{
	    	$order[ $mealOrdinal ]['ingredients'][$ingredientId] = 1;
	    	$this->Session->write('order', $order);
	    }
	    return $this->redirect(array('action' => 'ingredientsSelect'));
    }
    
    public function ingredientRemove( $mealOrdinal, $ingredientId )
    {
    	$order = $this->Session->read('order');
    	unset( $order[ $mealOrdinal ]['ingredients'][ $ingredientId ] );
    	$this->Session->write('order', $order);
    	return $this->redirect(array('action' => 'ingredientsSelect'));    	
    }
    
    public function orderConfirm()
    {
    
    }
    
    public function previewOrder()
    {
    
    }
    
    public function edit( $id = null )
    {
    	if ($this->request->is('post')) {
            $this->Order->id = $id;
            if( $this->Order->save($this->request->data) )
            {
            	return $this->redirect(array('action' => 'edit', $id));
            }
        }
        else
        {
        	$meal = $this->Order->findById( $id );
        	$this->set( 'meal', $order );
        }
    }

    
}
?>