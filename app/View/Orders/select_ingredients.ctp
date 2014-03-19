<?php foreach( $order as $mealId => $ingredients ):?>
	Id posi³ku: <?php echo $mealId?><br />
	Sk³adniki:
	<ul>
		<?php foreach( $ingredients as $ingredientId => $ingredientAmount ):?>
			<li>Sk³adnik <?php echo $ingredientId?> w iloœci <?php echo $ingredientAmount?>
				[<?php echo $this->Html->link( "+", array('action'=> 'ingredientAmountIncrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "-", array('action'=> 'ingredientAmountDecrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "x", array('action'=> 'ingredientRemove', $mealId, $ingredientId));?>]
			</li>
		<?php endforeach?>
	</ul>
<?php endforeach?>