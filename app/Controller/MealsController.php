<?php
class MealsController extends AppController {
    public function view( $id ) {
        $meal = $this->Meal->findById( $id );
        $this->set( 'meal', $meal );
    }
    
    public function add()
    {
    	if ($this->request->is('post')) {
            $this->Meal->create();
            if( $this->Meal->save($this->request->data) )
            {
            	return $this->redirect(array('action' => 'add'));
            }
        }
    }
    
    public function edit( $id = null )
    {
    	if ($this->request->is('post')) {
            $this->Meal->id = $id;
            if( $this->Meal->save($this->request->data) )
            {
            	return $this->redirect(array('action' => 'edit', $id));
            }
        }
        else
        {
        	$meal = $this->Meal->findById( $id );
        	$this->set( 'meal', $meal );
        }
    }


}
?>