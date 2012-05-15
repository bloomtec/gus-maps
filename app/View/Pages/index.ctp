<div class="index">
	<div id="main_map" class='map'></div>
	<div class="controls">
		
		<h1>Buscar Oficina:</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		</p>
		<?php echo $this -> Form -> create()?>
		<?php echo $this -> Form -> input('office_type_id',array('label'=>'Tipo de oficina:','empty'=>'Cualquiera','id'=>'tipo')) ?>
		<?php echo $this -> Form -> input('city_id',array('label'=>'Ciudad:','id'=>'ciudad')); ?>
		<?php echo $this -> Form -> input('direccion',array('label'=>'Dirección:')); ?>
		<?php echo $this -> Form -> end('Buscar');?>
	</div>
	<div style="clear: both;"></div>
</div>