<div class="officeTypes form">
<?php echo $this->Form->create('OfficeType');?>
	<fieldset>
		<legend><?php echo __('Modificar Tipo de Oficina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('icono_image');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
</div>