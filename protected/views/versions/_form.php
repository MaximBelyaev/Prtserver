<?php
/* @var $this VersionsController */
/* @var $model Versions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'versions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
		'class'=>'form-horizontal',
	),
)); ?>

	<p class="note">Обязательные поля <span class="required">*</span></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name', array('class'=>'col-sm-2')); ?>
		<div class='col-sm-10'>
			<?php echo $form->textField($model,'name',array('size'=>31,'maxlength'=>31, 'class'=>"form-control")); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('class'=>'col-sm-2')); ?>
		<div class='col-sm-10'>
			<?php echo $form->dropDownList($model,'status', Yii::app()->controller->getStatusesByLang('ru'), array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="form-group buttons">
		<div class="col-sm-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->