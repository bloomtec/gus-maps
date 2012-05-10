<div class="officeTypes view">
<h2><?php  echo __('Office Type');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icono Image'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['icono_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($officeType['OfficeType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Office Type'), array('action' => 'edit', $officeType['OfficeType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Office Type'), array('action' => 'delete', $officeType['OfficeType']['id']), null, __('Are you sure you want to delete # %s?', $officeType['OfficeType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Office Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Offices'), array('controller' => 'offices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('controller' => 'offices', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Offices');?></h3>
	<?php if (!empty($officeType['Office'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Office Type Id'); ?></th>
		<th><?php echo __('City Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
				<?php echo $this->Html->link(__('View'), array('controller' => 'offices', 'action' => 'view', $office['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'offices', 'action' => 'edit', $office['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'offices', 'action' => 'delete', $office['id']), null, __('Are you sure you want to delete # %s?', $office['id'])); ?>
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
