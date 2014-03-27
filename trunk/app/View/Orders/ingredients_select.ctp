<?php foreach( $order as $mealOrdinal => $mealDetails ):?>
	Nazwa dania: <?php echo $mealDetails['name']?> w ilości <?php echo $mealDetails['amount']?>
	[<?php echo $this->Html->link( "+", array('action'=> 'mealAmountIncrease', $mealOrdinal));?>]
	[<?php echo $this->Html->link( "-", array('action'=> 'mealAmountDecrease', $mealOrdinal));?>]
	[<?php echo $this->Html->link( "x", array('action'=> 'mealRemove', $mealOrdinal));?>]
	<br />
	Składniki/dodatki:
	<ul>
		<?php foreach( $mealDetails['ingredients'] as $ingredientId => $ingredientDetails ):?>
			<li><?php echo $ingredientDetails['name']?> w ilości <?php echo $ingredientDetails['amount']?>
				[<?php echo $this->Html->link( "+", array('action'=> 'ingredientAmountIncrease', $mealOrdinal, $ingredientId));?>] 
				[<?php echo $this->Html->link( "-", array('action'=> 'ingredientAmountDecrease', $mealOrdinal, $ingredientId));?>] 
				[<?php echo $this->Html->link( "x", array('action'=> 'ingredientRemove', $mealOrdinal, $ingredientId));?>]
			</li>
		<?php endforeach?>
	</ul>
	<br />
	Dodaj składnik:
	<ul>
	<?php foreach( $ingredients as $ingredient ):?>
			<?php if( array_key_exists( $ingredient['Ingredient']['id'], $mealDetails['ingredients'] ) == false ):?>
				<li><?php echo $this->Html->link( $ingredient['Ingredient']['name'], array('action'=> 'ingredientAdd', $mealOrdinal, $ingredient['Ingredient']['id']) ); ?></li>
			<?php endif?>
	<?php endforeach?>
	</ul>
	<hr />
<?php endforeach?>