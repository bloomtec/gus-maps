<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this -> Html -> charset();?>
		<title><?php
		if (isset($company_name))
			echo $company_name . ' :: ';
		if (isset($title_for_layout))
			echo $title_for_layout;
			?>
		</title>
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&region=co"></script>
		<?php
		echo $this -> Html -> meta('icon');
		echo $this -> Html -> css('styles');
		echo $this -> Html -> css('jquery-ui-1.8.20.custom');
		echo $this -> Html -> css('gmap');
		echo $this -> Html -> script('jquery');
		echo $this -> Html -> script('jquery.tools.min');
		echo $this -> Html -> script("jquery-ui-1.8.20.custom.min");
		echo $this -> Html -> script('bjs');
		echo $this -> Html -> script('default');
		echo $this -> Html -> script('common');
		echo $this -> Html -> script('gmap');
		echo $scripts_for_layout;
		?>

	</head>
	<body  id="layout_mapas">
		<div id="container">
			<?php echo $this -> element('header');?>
			<div id="content">
				<?php echo $this -> Session -> flash('auth');?>
				<?php echo $this -> Session -> flash();?>

				<?php echo $content_for_layout;?>
			</div>
			<?php echo $this -> element('footer');?>
		</div>
		<?php echo $this -> element('menu');?>

		<?php echo $this -> element('sql_dump');?>
	</body>
</html>