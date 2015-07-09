<?php
/* @var $this AnggotaDivisiController */
/* @var $model AnggotaDivisi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'anggota-divisi-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'divisi'); ?>
		<?php echo $form->textField($model,'divisi',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'divisi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_account'); ?>
		<?php echo $form->textField($model,'id_account'); ?>
		<?php echo $form->error($model,'id_account'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->