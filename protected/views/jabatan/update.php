<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs=array(
	'Jabatans'=>array('index'),
	$model->inisial=>array('view','id'=>$model->inisial),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jabatan', 'url'=>array('index')),
	array('label'=>'Create Jabatan', 'url'=>array('create')),
	array('label'=>'View Jabatan', 'url'=>array('view', 'id'=>$model->inisial)),
	array('label'=>'Manage Jabatan', 'url'=>array('admin')),
);
?>

<h1>Update Jabatan <?php echo $model->inisial; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>