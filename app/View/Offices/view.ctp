<div class="offices view">
<h2><?php  echo __('Oficina');?></h2>
	<dl>
		
		<dt><?php echo __('Tipo De Oficina'); ?></dt>
		<dd>
			<?php echo $this->Html->link($office['OfficeType']['nombre'], array('controller' => 'office_types', 'action' => 'view', $office['OfficeType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo $this->Html->link($office['City']['nombre'], array('controller' => 'cities', 'action' => 'view', $office['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($office['Office']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dirección'); ?></dt>
		<dd>
			<?php echo h($office['Office']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($office['Office']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd class="lat">
			<?php echo h($office['Office']['latitud']); ?>
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd class="lng">
			<?php echo h($office['Office']['longitud']); ?>
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($office['Office']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($office['Office']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
	<div id="office-view-map" class='mapView'>
		
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $office['Office']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?> </li>
	</ul>
</div>
