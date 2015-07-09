<?php
/* @var $this SiteController */
/* @var $model Agenda */
/* @var $criteria field criteria */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <?php if ($criteria == 'topic') { ?>
    <div class="row" style="float: left; padding-right: 5px;">
            <?php // echo $form->label($model, 'topik'); ?>
            <?php echo $form->textField($model, 'topik', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'topic here..', 'style'=>'height:30px;width:375px;')); ?>
        </div>
    <?php } else if ($criteria == 'description') { ?>
        <div class="row" style="float: left; padding-right: 5px;">
            <?php // echo $form->label($model, 'deskripsi'); ?>
            <?php echo $form->textField($model, 'deskripsi', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'description here..', 'style'=>'height:30px;width:375px;')); ?>
        </div>
    <?php } ?>

    <div class="row">
        <?php
        echo CHtml::submitButton('Search', array(
            'class'=>'btn',
        )); 
        /*echo Chtml::ajaxSubmitButton('Search', array("searchBy"), array(
            'update' => '#search_result',
            'success' => 'function() {'
            . 'alert("success");'
            . '}'
        ));*/
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->