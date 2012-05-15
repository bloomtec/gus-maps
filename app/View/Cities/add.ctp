<div class="offices form dos-col">
<?php echo $this->Form->create('City');?>
	<fieldset>
		<legend><?php echo __('Añadir Ciudad'); ?></legend>
	<?php
		echo $this->Form->input('direccion_geografica',array('label'=>'Direción Geográfica','class'=>'cityQuery'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion', array('label' => 'Descripción'));
		echo $this->Form->input('latitud',array('class'=>'lat'));
		echo $this->Form->input('longitud',array('class'=>'lng'));
		
		//echo $this->Form->input('image');
	;
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
<div class="second-col">
	<div id="map_city" class="map">
		
	</div>
</div>
</div>
