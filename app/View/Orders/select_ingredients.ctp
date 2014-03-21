<?php foreach( $order as $mealId => $mealDetails ):?>
	Nazwa dania: <?php echo $mealDetails['name']?><br />
	Sk³adniki:
	<ul>
		<?php foreach( $mealDetails['ingredients'] as $ingredientId => $ingredientDetails ):?>
			<li>Sk³adnik <?php echo $ingredientDetails['name']?> w iloœci <?php echo $ingredientDetails['amount']?>
				[<?php echo $this->Html->link( "+", array('action'=> 'ingredientAmountIncrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "-", array('action'=> 'ingredientAmountDecrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "x", array('action'=> 'ingredientRemove', $mealId, $ingredientId));?>]
			</li>
		<?php endforeach?>
	</ul>
<?php endforeach?>