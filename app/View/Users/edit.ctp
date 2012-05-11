<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('role_id');
		echo $this->Form->input('username', array('label'=>'Usuario'));
		echo $this->Form->input('password', array('label'=>'Contraseña'));
		echo $this->Form->input('email', array('label'=>'Correo'));
		echo $this->Form->input('verified_email', array('label'=>'Correo Verificado'));
		echo $this->Form->input('is_active', array('label'=>'Activo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ver Usuarios'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Ver Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Rol'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
