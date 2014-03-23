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
    public function addMeal( $mealId = null )
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
    			$order[ $mealId ]  = array();
    		}

			foreach( $orderReqRes['MealComposition'] as $ingredient )
    		{
    			$order[ $mealId ][$ingredient['ingredient_id']] = $ingredient['ingredient_amount'];
    		}
    		
			$this->Session->write('order', $order);
			
			return $this->redirect(array('action' => 'selectIngredients'));
    	}
    }
    
    // add ingredients for selected meals
    public function selectIngredients()
    {
    	$order = $this->Session->read('order');
    	$orderForView = array();
    	$ingredientsForView = $this->Order->Meal->MealComposition->Ingredient->find( 'all' );
    	
    	// get meals details for view
    	foreach( $order as $mealId => $ingredients )
    	{
    		$mealInfo = $this->Order->Meal->findById( $mealId );
    		$orderForView[ $mealId ]['name'] = $mealInfo['Meal']['name'];
    		
    		foreach( $ingredients as $ingredientId => $ingredientAmount )
    		{
    			$ingredientInfo = $this->Order->Meal->MealComposition->Ingredient->findById( $ingredientId );
    			$orderForView[ $mealId ]['ingredients'][$ingredientId]['name'] = $ingredientInfo['Ingredient']['name'];
    			$orderForView[ $mealId ]['ingredients'][$ingredientId]['amount'] = $ingredientAmount;
    		}
    	}
    	
    	$this->set( 'order', $orderForView );
    	$this->set( 'ingredients', $ingredientsForView );
    }
    
    public function ingredientAmountIncrease( $mealId = null, $ingredientId = null )
    {
    	if( $mealId == null || $ingredientId == null )
    	{
    		return $this->redirect(array('action' => 'selectIngredients'));
		}
		else
		{
	    	$order = $this->Session->read('order');
	    	$order[ $mealId ][ $ingredientId ] += 1;
	    	$this->Session->write('order', $order);
	    	return $this->redirect(array('action' => 'selectIngredients'));
		}
    }
    
    public function ingredientAmountDecrease( $mealId, $ingredientId )
    {
    	$order = $this->Session->read('order');
    	if( $mealId == null || $ingredientId == null || $order[ $mealId ][ $ingredientId ] == 0 )
    	{
    		return $this->redirect(array('action' => 'selectIngredients'));
		}
		else
		{
			if( $order[ $mealId ][ $ingredientId ] == 1 )
			{
				unset( $order[ $mealId ][ $ingredientId ] );
			}
			else
			{
		    	$order[ $mealId ][ $ingredientId ] -= 1;	
		    }
		    $this->Session->write('order', $order);
	    	return $this->redirect(array('action' => 'selectIngredients'));
		}		
    }
    
    public function ingredientAdd( $mealId, $ingredientId )
    {
    	$order = $this->Session->read('order');
  		if( array_key_exists ( $ingredientId, $order[ $mealId ] ) == false )
  		{
	    	$order[ $mealId ][$ingredientId] = 1;
	    	$this->Session->write('order', $order);
	    }
	    return $this->redirect(array('action' => 'selectIngredients'));
    }
    
    public function ingredientRemove( $mealId, $ingredientId )
    {
    	$order = $this->Session->read('order');
    	unset( $order[ $mealId ][ $ingredientId ] );
    	$this->Session->write('order', $order);
    	return $this->redirect(array('action' => 'selectIngredients'));    	
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