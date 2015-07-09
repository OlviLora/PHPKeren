<?php
/* @var $this AbsenAnggotaController */
/* @var $model AbsenAnggota */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'absen-anggota-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_rapat'); ?>
		<?php echo $form->textField($model,'id_rapat'); ?>
		<?php echo $form->error($model,'id_rapat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_account'); ?>
		<?php echo $form->textField($model,'id_account'); ?>
		<?php echo $form->error($model,'id_account'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inisial_jabatan'); ?>
		<?php echo $form->textField($model,'inisial_jabatan',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'inisial_jabatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textField($model,'keterangan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->