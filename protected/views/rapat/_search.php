<?php
/* @var $this RapatController */
/* @var $model Rapat */
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
        <?php echo $form->label($model, 'waktu_tanggal'); ?>
        <?php echo $form->textField($model, 'waktu_tanggal', array('style'=>'height:30px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tempat'); ?>
        <?php echo $form->textField($model, 'tempat', array('size' => 20, 'maxlength' => 20, 'style'=>'height:30px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'jenis_rapat'); ?>
        <?php echo $form->textField($model, 'jenis_rapat', array('size' => 3, 'maxlength' => 3, 'style'=>'height:30px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'chairperson'); ?>
        <?php echo $form->textField($model, 'chairperson', array('size' => 3, 'maxlength' => 3, 'style'=>'height:30px;')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'notulen'); ?>
        <?php echo $form->textField($model, 'notulen', array('size' => 3, 'maxlength' => 3, 'style'=>'height:30px;')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search', array(
            'class'=>'btn',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->