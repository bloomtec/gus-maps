<div class='login'>
	<?php echo $this -> Form -> create('User', array('action' => 'login'));?>
	<legend>
		<?php __('Iniciar Sesión', true);?>
	</legend>
	<?php echo $this -> Form -> input('username', array('label' => __('Usuario', true), 'required' => 'required'));?>
	<?php echo $this -> Form -> input('password', array('label' => __('Contraseña', true), 'required' => 'required'));?>
	<?php echo $this -> Form -> end(__('Login', true));?>
</div>
<?php //echo $this -> element('ajax-login');?>