<div class="cities view">
<h2><?php  echo __('Ciudad');?></h2>
	<dl>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($city['City']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($city['City']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo h($city['City']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd>
			<?php echo h($city['City']['latitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($city['City']['longitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($city['City']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($city['City']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?> </li>
	
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Offices');?></h3>
	<?php if (!empty($city['Office'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo De Oficina'); ?></th>
		<th><?php echo __('Ciudad'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripción'); ?></th>
		<th><?php echo __('Creado'); ?></th>
		<th><?php echo __('Modificado'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($city['Office'] as $office): ?>
		<tr>
			<td><?php echo $office['id'];?></td>
			<td><?php echo $office['office_type_id'];?></td>
			<td><?php echo $office['city_id'];?></td>
			<td><?php echo $office['nombre'];?></td>
			<td><?php echo $office['descripcion'];?></td>
			<td><?php echo $office['created'];?></td>
			<td><?php echo $office['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'offices', 'action' => 'view', $office['id'])); ?>
				<?php echo $this->Html->link(__('Modificar'), array('controller' => 'offices', 'action' => 'edit', $office['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'offices', 'action' => 'delete', $office['id']), null, __('¿Seguro desea elminiar # %s?', $office['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Office'), array('controller' => 'offices', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
