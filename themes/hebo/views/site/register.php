<?php
$this->pageTitle = Yii::app()->name . ' - Register';
$this->breadcrumbs = array(
    'Register',
);
?> 

<h1>Register</h1> 
<p>Please fill out the following form to register:</p>
<!-- form --> 
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'registration-form',
        'enableAjaxValidation' => false,
            ));
    ?> 
    <p class="note">Fields with <span class="required">*</span> are 
        required.</p> 
    
    <?php echo $form->errorSummary($model); ?> 
    
    <div class="row"> 
        <?php echo $form->labelEx($model, 'NIDN'); ?> 
        <?php echo $form->textField($model, 'NIDN'); ?> 
        <?php echo $form->error($model, 'NIDN'); ?> 
    </div> 
    <div class="row"> 
        <?php echo $form->labelEx($model, 'nama'); ?> 
        <?php echo $form->textField($model, 'nama'); ?> 
        <?php echo $form->error($model, 'nama'); ?> 
    </div> 
    <div class="row"> 
        <?php echo $form->labelEx($model, 'inisial'); ?> 
        <?php echo $form->textField($model, 'inisial'); ?> 
        <?php echo $form->error($model, 'inisial'); ?> 
    </div> 
    <div class="row"> 
        <?php echo $form->labelEx($model, 'email'); ?> 
        <?php echo $form->textField($model, 'email'); ?> 
        <?php echo $form->error($model, 'email'); ?> 
    </div> 
    <div class="row"> 
        <?php echo $form->labelEx($model, 'telepon'); ?> 
        <?php echo $form->textField($model, 'telepon'); ?> 
        <?php echo $form->error($model, 'telepon'); ?> 
    </div> 
    <div class="row"> 
        <?php echo $form->labelEx($model, 'username'); ?> 
        <?php echo $form->textField($model, 'username'); ?> 
        <?php echo $form->error($model, 'username'); ?> 
    </div> 
    <div class="row"> 
        <?php echo $form->labelEx($model, 'password'); ?> 
        <?php echo $form->passwordField($model, 'password'); ?> 
        <?php echo $form->error($model, 'password'); ?> 
    </div> 
    <div class="row"> 
        <?php echo $form->labelEx($model, 'repassword'); ?> 
        <?php echo $form->passwordField($model, 'repassword'); ?> 
        <?php echo $form->error($model, 'repassword'); ?> 
    </div> 
    <div class="row buttons"> 
        <?php echo CHtml::submitButton('Register'); ?> 
    </div> 
    
    <?php $this->endWidget(); ?> 
</div><!-- form -->