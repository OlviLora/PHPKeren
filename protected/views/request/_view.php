<?php
/* @var $this RequestController */
/* @var $data Request */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_account')); ?>:</b>
    <?php echo CHtml::encode($data->id_account); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('topik')); ?>:</b>
    <?php echo CHtml::encode($data->topik); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
    <?php echo CHtml::encode($data->deskripsi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br />


</div>