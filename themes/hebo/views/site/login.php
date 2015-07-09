<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
?>

<div class="hansLoginEffect">
    <h1>Login</h1>
    <div class="form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'Username'); ?>
            <?php echo $form->textField($model, 'username', array('style'=>'height:30px;')); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'Password'); ?>
            <?php echo $form->passwordField($model, 'password', array('style'=>'height:30px;')); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <?php echo $form->label($model, 'rememberMe', array('style'=>'height:30px;')); ?>
            <?php echo $form->error($model, 'rememberMe'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Login', array(
            'class'=>'btn',
        )); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>