<?php
class Meal extends AppModel
{
    public $hasAndBelongsToMany = array(
        'Order' =>
            array(
                'className' => 'Order'
            )
    );
    
    public $hasMany = array('MealComposition', 'MealsOrder');
}
?>