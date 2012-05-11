<div class="cities index">
	<h2><?php echo __('Cities');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id', __('ID', true));?></th>
			<th><?php echo $this->Paginator->sort('nombre', __('Nombre', true));?></th>
			<th><?php echo $this->Paginator->sort('descripcion', __('Descripción', true));?></th>
			<th><?php echo $this->Paginator->sort('image', __('Imagenh', true));?></th>
			<th><?php echo $this->Paginator->sort('created', __('Creado', true));?></th>
			<th><?php echo $this->Paginator->sort('modified', __('Modificado', true));?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($cities as $city): ?>
	<tr>
		<td><?php echo h($city['City']['id']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['image']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['created']); ?>&nbsp;</td>
		<td><?php echo h($city['City']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $city['City']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $city['City']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $city['City']['id']), null, __('Are you sure you want to delete # %s?', $city['City']['id'])); ?>
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
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Añadir Ciudad'), array('action' => 'add')); ?></li>
		
	</ul>
</div>