<?php
/* @var $this AgendaController */
/* @var $model Agenda */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'addAgenda-form',
        'enableAjaxValidation' => false,
    ));
    ?>

<!--    <p class="note">Fields with <span class="required">*</span> are required.</p>-->

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'topik'); ?>
        <?php echo $form->textField($model, 'topik', array('size' => 50, 'maxlength' => 50, 'style'=>'height:30px;')); ?>
        <?php echo $form->error($model, 'topik'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'deskripsi'); ?>
        <?php echo $form->textField($model, 'deskripsi', array('size' => 60, 'maxlength' => 100, 'style'=>'height:30px;')); ?>
        <?php echo $form->error($model, 'deskripsi'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'PIC'); ?>
        <?php echo $form->dropDownList($model, 'PIC', $this->getMembers()); ?>
        <?php echo $form->error($model, 'PIC'); ?>
    </div>

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'status'); ?>
    <?php echo $form->textField($model, 'status', array('size' => 3, 'maxlength' => 3, 'style'=>'height:30px;')); ?>
    <?php echo $form->error($model, 'status'); ?>
    </div>-->

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'hasil'); ?>
    <?php echo $form->textField($model, 'hasil', array('size' => 60, 'maxlength' => 100, 'style'=>'height:30px;')); ?>
    <?php echo $form->error($model, 'hasil'); ?>
    </div>-->

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'class'=>'btn',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->