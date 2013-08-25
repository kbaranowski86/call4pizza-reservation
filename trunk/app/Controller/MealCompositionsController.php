<?php
class MealCompositionsController extends AppController {
    public function viewMealIngredients( $id ) {
        $mealCompositions = $this->MealComposition->findAllByMealId( $id );
        $this->set( 'mealComposition', $mealCompositions );
    }
}
?>