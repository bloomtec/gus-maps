<div class="offices form dos-col">
<?php echo $this->Form->create('Office');?>
	<fieldset>
		<legend><?php echo __('Añadir Oficina'); ?></legend>
	<?php
		echo $this->Form->input('office_type_id');
		echo $this->Form->input('city_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('latitud',array('class'=>'lat'));
		echo $this->Form->input('longitud',array('class'=>'lng'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
<div class="second-col">
	<div id="map_canvas">
		
	</div>
</div>
</div>