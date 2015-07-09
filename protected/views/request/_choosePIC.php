<?php
/* @var $this RequestController */
/* @var $picForm PICForm */
?>

<?php
$temp = Yii::app()->createController('agenda');
$agendaController = $temp[0];
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'agenda-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    
    <div class="row">
        <?php echo 'PIC Agenda :' ?>
        <?php echo $form->dropDownList($picForm, 'PIC', $agendaController->getMembers()); ?>
        <?php echo $form->error($picForm, 'PIC'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->