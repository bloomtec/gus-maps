<div class="offices index">
	<h2><?php echo __('Oficinas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('office_type_id', 'Tipo De Oficina');?></th>
			<th><?php echo $this->Paginator->sort('city_id', 'Ciudad');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('direccion', 'Dirección');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($offices as $office): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($office['OfficeType']['nombre'], array('controller' => 'office_types', 'action' => 'view', $office['OfficeType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($office['City']['nombre'], array('controller' => 'cities', 'action' => 'view', $office['City']['id'])); ?>
		</td>
		<td><?php echo h($office['Office']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['direccion']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $office['Office']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $office['Office']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $office['Office']['id']), null, __('Está seguro que quiere borrar el registro # %s?', $office['Office']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, desde el registro {:start}, hasta el {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->first(' << ' . __(' inicio '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev(' < ' . __(' anterior '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__(' siguiente ') . ' > ', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last(__(' fin ') . ' >> ', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Añadir Oficina'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
