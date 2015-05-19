<?php
/* @var $this CustomersController */
/* @var $data Customers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->c_id), array('view', 'id'=>$data->c_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skype')); ?>:</b>
	<?php echo CHtml::encode($data->skype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vk')); ?>:</b>
	<?php echo CHtml::encode($data->vk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fb')); ?>:</b>
	<?php echo CHtml::encode($data->fb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_date')); ?>:</b>
	<?php echo CHtml::encode($data->reg_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('license')); ?>:</b>
	<?php echo CHtml::encode($data->license); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	*/ ?>

</div>