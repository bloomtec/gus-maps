<div class="offices form dos-col">
<?php echo $this->Form->create('Office');?>
	<fieldset>
		<legend><?php echo __('Modificar Oficina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('office_type_id', array('label' => 'Tipo De Oficina'));
		echo $this->Form->input('city_id',array('label' => 'Ciudad', 'class'=>'cityId'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('direccion', array('label'=>'Dirección'));
		echo $this->Form->input('descripcion', array('label' => 'Descripción'));
		echo $this->Form->input('latitud',array('class'=>'lat'));
		echo $this->Form->input('longitud',array('class'=>'lng'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
<div class="second-col">
	<div id="map_offices" class='map'>
		
	</div>
</div>
</div>