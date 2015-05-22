<?php
/* @var $this CustomersController */
/* @var $model Customers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customers-form',
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
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>"form-control")); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email', array('class'=>'col-sm-2')); ?>
		<div class='col-sm-10'>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'skype', array('class'=>'col-sm-2')); ?>
		<div class='col-sm-10'>
		<?php echo $form->textField($model,'skype',array('size'=>60,'maxlength'=>255, 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'skype'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'vk', array('class'=>'col-sm-2')); ?>
		<div class='col-sm-10'>
		<?php echo $form->textField($model,'vk',array('size'=>60,'maxlength'=>255, 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'vk'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fb', array('class'=>'col-sm-2')); ?>
		<div class='col-sm-10'>
		<?php echo $form->textField($model,'fb',array('size'=>60,'maxlength'=>255, 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'fb'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('class'=>'col-sm-2')); ?>
		<div class='col-sm-10'>
		<?php echo $form->dropDownList($model,'status', Yii::app()->controller->getStatusesByLang('ru'), array( 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'comment', array('class'=>'col-sm-2')); ?>
		<div class='col-sm-10'>
		<?php echo $form->textArea($model,'comment',array('size'=>60,'maxlength'=>4095, 'class'=>"form-control")); ?>
		<?php echo $form->error($model,'comment'); ?>
		</div>
	</div>

	<div class="form-group buttons">
		<div class="col-sm-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->