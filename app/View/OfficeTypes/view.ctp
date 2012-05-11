<div class="officeTypes view">
<h2><?php  echo __('Office Type');?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ícono'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['icono_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar Tipo De Oficina'), array('action' => 'edit', $officeType['OfficeType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Tipo De Oficina'), array('action' => 'delete', $officeType['OfficeType']['id']), null, __('Are you sure you want to delete # %s?', $officeType['OfficeType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Ver Tipos De Oficina'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Tipo De Oficina'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ver Oficinar'), array('controller' => 'offices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Oficinas'), array('controller' => 'offices', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Oficinas Relacionadas');?></h3>
	<?php if (!empty($officeType['Office'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('Tipo De Oficina'); ?></th>
		<th><?php echo __('Ciudad'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripción'); ?></th>
		<th><?php echo __('Creado'); ?></th>
		<th><?php echo __('Modificado'); ?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($officeType['Office'] as $office): ?>
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
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'offices', 'action' => 'delete', $office['id']), null, __('Are you sure you want to delete # %s?', $office['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Agregar Oficina'), array('controller' => 'offices', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
