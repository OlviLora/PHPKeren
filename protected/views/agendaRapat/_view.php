<?php
/* @var $this AgendaRapatController */
/* @var $data AgendaRapat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rapat')); ?>:</b>
	<?php echo CHtml::encode($data->id_rapat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_agenda')); ?>:</b>
	<?php echo CHtml::encode($data->id_agenda); ?>
	<br />


</div>