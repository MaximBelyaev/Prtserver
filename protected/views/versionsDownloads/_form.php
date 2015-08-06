<?php
/* @var $this VersionsDownloadsController */
/* @var $model VersionsDownloads */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'versions-downloads-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'v_id'); ?>
		<?php echo $form->textField($model,'v_id'); ?>
		<?php echo $form->error($model,'v_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_id'); ?>
		<?php echo $form->textField($model,'c_id'); ?>
		<?php echo $form->error($model,'c_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip'); ?>
		<?php echo $form->textField($model,'ip'); ?>
		<?php echo $form->error($model,'ip'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->