<?php
/* @var $this AbsenAnggotaController */
/* @var $model AbsenAnggota */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_rapat'); ?>
		<?php echo $form->textField($model,'id_rapat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_account'); ?>
		<?php echo $form->textField($model,'id_account'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inisial_jabatan'); ?>
		<?php echo $form->textField($model,'inisial_jabatan',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textField($model,'keterangan',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->