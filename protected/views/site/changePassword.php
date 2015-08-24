<?php
$this->pageTitle=Yii::app()->name . ' - Change password';
?>

<h1>Смена пароля</h1>

<p>Введите новый пароль</p>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->textField($model,'password', array('value' => '')); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->