<?php
class MealComposition extends AppModel {
    public $belongsTo = array(
        'Meal', 'Ingredient'
    );
}
?>