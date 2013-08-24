<?php
class MealsController extends AppController {
    public function view( $id ) {
        $meal = $this->Meal->findById( $id );
        $this->set( 'meal', $meal );
    }
}
?>