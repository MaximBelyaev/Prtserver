<?php
/* @var $this VersionsController */
/* @var $model Versions */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'v_id'); ?>
		<?php echo $form->textField($model,'v_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>31,'maxlength'=>31)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dir'); ?>
		<?php echo $form->textField($model,'dir',array('size'=>60,'maxlength'=>511)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->