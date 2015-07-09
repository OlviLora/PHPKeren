<?php
/* @var $this RapatController */
/* @var $model Rapat */
/* @var $form CActiveForm */

/* @var $agendaController AgendaController */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'rapat-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'waktu_tanggal'); ?>
        <?php
        $this->widget('application.extensions.jui.EJuiDateTimePicker', array(
            'name' => 'MeetingForm[waktu_tanggal]',
            'model' => $model,
            'attribute' => 'waktu_tanggal',
            'language' => 'en',
            'mode' => 'datetime',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'slideDown',
                'minDate' => 'new Date()',
                'changeMonth' => true,
                'changeYear' => true,
                'dateFormat' => 'yy-mm-dd',
                'timeFormat' => 'hh:mm:ss',
                'langType' => 'en'
            ),
            'htmlOptions' => array(
                'style' => 'height: 30px;',
            ),
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tempat'); ?>
        <?php echo $form->textField($model, 'tempat', array('size' => 20, 'maxlength' => 20, 'style' => 'height:30px;')); ?>
        <?php echo $form->error($model, 'tempat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'chairperson'); ?>
        <?php echo $form->dropDownList($model, 'chairperson', $this->getMembers(), array('empty' => '-Pilih-')); ?>
        <?php echo $form->error($model, 'chairperson'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'notulen'); ?>
        <?php echo $form->dropDownList($model, 'notulen', $this->getMembers(), array('empty' => '-Pilih-')); ?>
        <?php echo $form->error($model, 'notulen'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'jenis_rapat'); ?>
        <?php
        echo $form->dropDownList($model, 'jenis_rapat', $this->getMeetingCategories(), array(
            'empty' => '-Pilih-',
            'ajax' => array(
                'type' => 'POST',
                'url' => CController::createUrl('rapat/updateAgendaForm'),
                'update' => '#agenda_form',
                //'submit' => CController::createUrl('rapat/create'),
                'data' => array('jenisRapat' => 'js:this.value'),
                //'csrf' => true
            ),
            //'AKD' => 'true'
        ));
        ?>
        <?php echo $form->error($model, 'jenis_rapat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'grup_rapat'); ?>
        <?php echo $form->dropDownList($model, 'grup_rapat', $this->getMeetingGroups(), array('empty' => '-Pilih-')); ?>
        <?php echo $form->error($model, 'grup_rapat'); ?>
    </div>

    <?php
    $prevMinutes = $this->getPreviousMinutes();
    //var_dump($prevMinutes);
    $undiscussedAgendas = $this->getUndiscussedAgenda();
    ?>
    <div id="agenda_form">
        <?php
        $this->renderPartial('__agendaForm', array(
            'prevMinutes' => $prevMinutes,
            'undiscussedAgendas' => $undiscussedAgendas
        ));
        ?>
    </div>


    <div class="row buttons">
        <?php
        echo CHtml::submitButton('Create', array(
            'class' => 'btn',
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->