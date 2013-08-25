<?php
class MealCompositionsController extends AppController
{
    public function viewMealIngredients( $id )
    {
        $mealCompositions = $this->MealComposition->findAllByMealId( $id );
        $this->set( 'mealComposition', $mealCompositions );
    }
    
    public function add()
    {
    	if ($this->request->is('post')) {
            $this->MealComposition->create();
            if( $this->MealComposition->save($this->request->data) )
            {
            	return $this->redirect(array('action' => 'add'));
            }
        }
        else
        {
	    	$meals = $this->MealComposition->Meal->find('list');
	    	$this->set(compact('meals'));
	    	
	    	$ingredients = $this->MealComposition->Ingredient->find('list');
	    	$this->set(compact('ingredients'));
	   	}	
    }
}
?>