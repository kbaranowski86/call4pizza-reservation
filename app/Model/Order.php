<?php
class Order extends AppModel {
    public $hasAndBelongsToMany = array(
        'Meal' =>
            array(
                'className' => 'Meal',
                'joinTable' => 'meals_orders',
                'foreignKey' => 'order_id',
                'associationForeignKey' => 'meal_id'
            )
    );
    
    public $belongsTo = 'User';
    
    public $hasOne = 'User';
    public $hasMany = 'MealsOrder';
}
?>