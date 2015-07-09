<?php
/* @var $this JabatanController */
/* @var $data Jabatan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('inisial')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->inisial), array('view', 'id'=>$data->inisial)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />


</div>