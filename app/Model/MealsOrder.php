<?php
class MealsOrder extends AppModel {
    public $belongsTo = array(
        'Meal', 'Order'
    );
}
?>