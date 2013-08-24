<?php
class Order extends AppModel {
    public $hasAndBelongsToMany = array(
        'OrderMeals' =>
            array(
                'className' => 'Meal',
                'joinTable' => 'meals_orders'
            )
    );
    
    public $belongsTo = 'User';
    
    public $hasOne = 'User';
}
?>