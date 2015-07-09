<?php
/* @var $this AgendaRapatController */
/* @var $model AgendaRapat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'agenda-rapat-form',
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
		<?php echo $form->labelEx($model,'id_agenda'); ?>
		<?php echo $form->textField($model,'id_agenda'); ?>
		<?php echo $form->error($model,'id_agenda'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->