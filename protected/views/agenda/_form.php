<?php
/* @var $this AgendaController */
/* @var $model Agenda */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'agenda-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'topik'); ?>
        <?php echo $form->textField($model, 'topik', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'topik'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'deskripsi'); ?>
        <?php echo $form->textField($model, 'deskripsi', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'deskripsi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'PIC'); ?>
        <?php echo $form->dropDownList($model, 'PIC', $this->getMembers()); ?>
        <?php echo $form->error($model, 'PIC'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jenis_rapat'); ?>
        <?php echo $form->dropDownList($model, 'jenis_rapat', $this->getMeetingCategories()); ?>
        <?php echo $form->error($model, 'jenis_rapat'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->