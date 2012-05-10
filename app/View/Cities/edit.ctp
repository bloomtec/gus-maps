<div class="cities form">
<?php echo $this->Form->create('City');?>
	<fieldset>
		<legend><?php echo __('Modificar Ciudad'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('latitud',array('class'=>'lat'));
		echo $this->Form->input('longitud',array('class'=>'lng'));
		
		echo $this->Form->input('image');
	;
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
</div>
<script>
	$(function(){
		BJS.JSONP("http://maps.googleapis.com/maps/api/geocode/json?address=Cali&sensor=false&region=co",{},function(data){
			console.log(data);
		})
	});
</script>