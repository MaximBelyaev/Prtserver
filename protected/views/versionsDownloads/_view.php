<?php
/* @var $this VersionsDownloadsController */
/* @var $data VersionsDownloads */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vd_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vd_id), array('view', 'id'=>$data->vd_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('v_id')); ?>:</b>
	<?php echo CHtml::encode($data->v_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_id')); ?>:</b>
	<?php echo CHtml::encode($data->c_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />


</div>