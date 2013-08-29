<?php
class IngredientsController extends AppController {    
    public function add()
    {
    	if ($this->request->is('post')) {
            $this->Ingredient->create();
            if( $this->Ingredient->save($this->request->data) )
            {
            	return $this->redirect(array('action' => 'add'));
            }
        }
    }

}
?>