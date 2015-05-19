<?php
/* @var $this VersionsController */
/* @var $data Versions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('v_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->v_id), array('view', 'id'=>$data->v_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dir')); ?>:</b>
	<?php echo CHtml::encode($data->dir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>