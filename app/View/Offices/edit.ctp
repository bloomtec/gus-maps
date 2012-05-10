<div class="offices form">
<?php echo $this->Form->create('Office');?>
	<fieldset>
		<legend><?php echo __('Modificar Oficina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('office_type_id');
		echo $this->Form->input('city_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('latitud');
		echo $this->Form->input('longitud');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
</div>