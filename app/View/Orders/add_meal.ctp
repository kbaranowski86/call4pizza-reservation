<ul>
<?php foreach( $meals as $meal ):?>
	<li><?php echo $this->Html->link( $meal['Meal']['name'], array('action'=> 'addmeal', $meal['Meal']['id']));?></li>
<?php endforeach ?>
</ul>