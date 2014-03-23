<?php foreach( $order as $mealId => $mealDetails ):?>
	Nazwa dania: <?php echo $mealDetails['name']?><br />
	Składniki/dodatki:
	<ul>
		<?php foreach( $mealDetails['ingredients'] as $ingredientId => $ingredientDetails ):?>
			<li><?php echo $ingredientDetails['name']?> w ilości <?php echo $ingredientDetails['amount']?>
				[<?php echo $this->Html->link( "+", array('action'=> 'ingredientAmountIncrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "-", array('action'=> 'ingredientAmountDecrease', $mealId, $ingredientId));?>] 
				[<?php echo $this->Html->link( "x", array('action'=> 'ingredientRemove', $mealId, $ingredientId));?>]
			</li>
		<?php endforeach?>
	</ul>
	<br />
	Dodaj składnik:
	<ul>
	<?php foreach( $ingredients as $ingredient ):?>
			<?php if( array_key_exists( $ingredient['Ingredient']['id'], $mealDetails['ingredients'] ) == false ):?>
				<li><?php echo $this->Html->link( $ingredient['Ingredient']['name'], array('action'=> 'ingredientAdd', $mealId, $ingredient['Ingredient']['id']) ); ?></li>
			<?php endif?>
	<?php endforeach?>
	</ul>
	<hr />
<?php endforeach?>