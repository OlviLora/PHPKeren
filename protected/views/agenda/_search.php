<?php
/* @var $this AgendaController */
/* @var $model Agenda */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'PIC'); ?>
        <?php echo $form->textField($model, 'PIC'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'topik'); ?>
        <?php echo $form->textField($model, 'topik', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'deskripsi'); ?>
        <?php echo $form->textField($model, 'deskripsi', array('size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->textField($model, 'status', array('size' => 3, 'maxlength' => 3)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'jenis_rapat'); ?>
        <?php echo $form->textField($model, 'jenis_rapat', array('size' => 5, 'maxlength' => 5)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'hasil'); ?>
        <?php echo $form->textField($model, 'hasil', array('size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->