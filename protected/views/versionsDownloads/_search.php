<?php
/* @var $this VersionsDownloadsController */
/* @var $model VersionsDownloads */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'vd_id'); ?>
		<?php echo $form->textField($model,'vd_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'v_id'); ?>
		<?php echo $form->textField($model,'v_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_id'); ?>
		<?php echo $form->textField($model,'c_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip'); ?>
		<?php echo $form->textField($model,'ip'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->