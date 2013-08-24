<?php
class Meal extends AppModel
{
    public $hasAndBelongsToMany = array(
        'MemberOfOrder' =>
            array(
                'className' => 'Order'
            )
    );
    
    public $hasMany = 'MealComposition';
}
?>