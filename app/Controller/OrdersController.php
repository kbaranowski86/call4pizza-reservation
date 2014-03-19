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
    		$order = array();

			foreach( $orderReqRes['MealComposition'] as $ingredient )
    		{
    			$order[ $orderReqRes['Meal']['id'] ][$ingredient['ingredient_id']] = $ingredient['ingredient_amount'];
    		}
    		
			$this->Session->write('order', $order);
			
			return $this->redirect(array('action' => 'selectIngredients'));
    	}
    }
    
    public function selectIngredients()
    {
    	
    }
    
    public function ingredientAmountIncrease( $ingredientId )
    {
    
    }
    
    public function ingredientAmountDecrease( $ingredientId )
    {
    
    }
    
    public function ingredientAdd( $ingredientId )
    {
    
    }
    
    public function ingredientRemove( $ingredientId )
    {
    
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