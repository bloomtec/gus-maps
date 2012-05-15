<div class="officeTypes index">
	<h2><?php echo __('Office Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('id'); ?></th>
			<th><?php echo $this -> Paginator -> sort('nombre'); ?></th>
			<th><?php echo $this -> Paginator -> sort('descripcion', 'Descripción'); ?></th>
			<th><?php echo $this -> Paginator -> sort('icono_image', 'Ícono'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($officeTypes as $officeType):
		?>
		<tr>
			<td><?php echo h($officeType['OfficeType']['id']); ?>&nbsp;</td>
			<td><?php echo h($officeType['OfficeType']['nombre']); ?>&nbsp;</td>
			<td><?php echo h($officeType['OfficeType']['descripcion']); ?>&nbsp;</td>
			<td>
				<?php //echo h($officeType['OfficeType']['icono_image']); ?>&nbsp;
				<img style="max-height:40px;" src="/<?php echo $officeType['OfficeType']['icono_image']; ?>" />
			</td>
			<td class="actions"><?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $officeType['OfficeType']['id'])); ?>
			<?php echo $this -> Html -> link(__('Modificar'), array('action' => 'edit', $officeType['OfficeType']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Eliminar'), array('action' => 'delete', $officeType['OfficeType']['id']), null, __('Are you sure you want to delete # %s?', $officeType['OfficeType']['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php
		echo $this -> Paginator -> counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, desde el registro {:start}, hasta el {:end}')));
		?>
	</p>

	<div class="paging">
		<?php
		echo $this -> Paginator -> first(' << ' . __(' inicio '), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> prev(' < ' . __(' anterior '), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__(' siguiente ') . ' > ', array(), null, array('class' => 'next disabled'));
		echo $this -> Paginator -> last(__(' fin ') . ' >> ', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Añadir Tipo de oficina'), array('action' => 'add')); ?>
		</li>

	</ul>
</div>
