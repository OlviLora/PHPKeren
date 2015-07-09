<?php
/* @var $this AnggotaDivisiController */
/* @var $data AnggotaDivisi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('divisi')); ?>:</b>
	<?php echo CHtml::encode($data->divisi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_account')); ?>:</b>
	<?php echo CHtml::encode($data->id_account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>