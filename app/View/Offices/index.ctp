<div class="offices index">
	<h2><?php echo __('Offices');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('office_type_id');?></th>
			<th><?php echo $this->Paginator->sort('city_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('descripcion');?></th>
			<th><?php echo $this->Paginator->sort('latitud');?></th>
			<th><?php echo $this->Paginator->sort('longitud');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($offices as $office): ?>
	<tr>
		<td><?php echo h($office['Office']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($office['OfficeType']['nombre'], array('controller' => 'office_types', 'action' => 'view', $office['OfficeType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($office['City']['nombre'], array('controller' => 'cities', 'action' => 'view', $office['City']['id'])); ?>
		</td>
		<td><?php echo h($office['Office']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['latitud']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['longitud']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['created']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $office['Office']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $office['Office']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $office['Office']['id']), null, __('Are you sure you want to delete # %s?', $office['Office']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Añadir Officina'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
