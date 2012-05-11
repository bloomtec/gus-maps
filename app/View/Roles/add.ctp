<div class="roles form">
<?php echo $this->Form->create('Role');?>
	<fieldset>
		<legend><?php echo __('Agregar Rol'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label'=>'Nombre'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ver Roles'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Ver Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
