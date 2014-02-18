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