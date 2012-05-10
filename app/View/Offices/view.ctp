<div class="offices view">
<h2><?php  echo __('Office');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($office['Office']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Office Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($office['OfficeType']['nombre'], array('controller' => 'office_types', 'action' => 'view', $office['OfficeType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($office['City']['nombre'], array('controller' => 'cities', 'action' => 'view', $office['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($office['Office']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($office['Office']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd>
			<?php echo h($city['City']['latitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($city['City']['logintud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($office['Office']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($office['Office']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Office'), array('action' => 'edit', $office['Office']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Office'), array('action' => 'delete', $office['Office']['id']), null, __('Are you sure you want to delete # %s?', $office['Office']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Offices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Office Types'), array('controller' => 'office_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office Type'), array('controller' => 'office_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
