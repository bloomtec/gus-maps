<div class="officeTypes form">
<?php echo $this->Form->create('OfficeType');?>
	<fieldset>
		<legend><?php echo __('Añadir Tipo de Oficina'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('icono_image');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
</div>
