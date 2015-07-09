<?php
/* @var $this AbsenAnggotaController */
/* @var $data AbsenAnggota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rapat')); ?>:</b>
	<?php echo CHtml::encode($data->id_rapat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_account')); ?>:</b>
	<?php echo CHtml::encode($data->id_account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inisial_jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->inisial_jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />


</div>