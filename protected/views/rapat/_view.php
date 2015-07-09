<?php
/* @var $this RapatController */
/* @var $data Rapat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat')); ?>:</b>
	<?php echo CHtml::encode($data->tempat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_rapat')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_rapat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PIC')); ?>:</b>
	<?php echo CHtml::encode($data->PIC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notulen')); ?>:</b>
	<?php echo CHtml::encode($data->notulen); ?>
	<br />


</div>