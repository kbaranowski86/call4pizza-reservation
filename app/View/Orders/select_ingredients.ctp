<?php foreach( $order as $mealId => $mealDetails ):?>
	Nazwa dania: <?php echo $mealDetails['name']?><br />
	Sk�adniki:
	<ul>
		<?php foreach( $mealDetails['ingredients'] as $ingredientId => $ingredientDetails ):?>
			<li>Sk�adnik <?php echo $ingredientDetails['name']?> w ilo�ci <?php echo $ingredientDetails['amount']?>
				[<?php echo $this->Html->link( "+", array('action'=> 'ingredientAmountIncrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "-", array('action'=> 'ingredientAmountDecrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "x", array('action'=> 'ingredientRemove', $mealId, $ingredientId));?>]
			</li>
		<?php endforeach?>
	</ul>
	<br />
	Dodaj sk�adnik:
	<ul>
	<?php foreach( $ingredients as $ingredient ):?>
		<li><?php echo $this->Html->link( $ingredient['Ingredient']['name'], array('action'=> 'ingredientAdd', $mealId, $ingredient['Ingredient']['id']) );?></li>
	<?php endforeach?>
	</ul>
	<hr />
<?php endforeach?>