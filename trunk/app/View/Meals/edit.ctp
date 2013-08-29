<?php
	echo $this->Form->create();
	echo $this->Form->input("name", array('default' => $meal['Meal']['name']));
	echo $this->Form->input("base_price", array('default' => $meal['Meal']['base_price']));
	echo $this->Form->end("Save");
?>