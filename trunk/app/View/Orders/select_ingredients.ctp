<?php foreach( $order as $mealId => $ingredients ):?>
	Id posi�ku: <?php echo $mealId?><br />
	Sk�adniki:
	<ul>
		<?php foreach( $ingredients as $ingredientId => $ingredientAmount ):?>
			<li>Sk�adnik <?php echo $ingredientId?> w ilo�ci <?php echo $ingredientAmount?>
				[<?php echo $this->Html->link( "+", array('action'=> 'ingredientAmountIncrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "-", array('action'=> 'ingredientAmountDecrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "x", array('action'=> 'ingredientRemove', $mealId, $ingredientId));?>]
			</li>
		<?php endforeach?>
	</ul>
<?php endforeach?>