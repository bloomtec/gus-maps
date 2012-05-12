<div class="officeTypes form">
	<?php echo $this -> Form -> create('OfficeType', array('type' => 'file')); ?>
	<fieldset>
		<legend>
			<?php echo __('Modificar Tipo de Oficina'); ?>
		</legend>
		<?php
			echo $this -> Form -> input('id');
			echo $this -> Form -> input('nombre');
			echo $this -> Form -> input('descripcion', array('label' => 'Descripción'));
			echo $this -> Form -> input('icono_image', array('label' => 'Ícono', 'type' => 'file'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(__('Guardar')); ?>
</div>