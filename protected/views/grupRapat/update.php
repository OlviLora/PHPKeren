<?php
/* @var $this GrupRapatController */
/* @var $model GrupRapat */

$this->breadcrumbs=array(
	'Grup Rapats'=>array('index'),
	$model->inisial=>array('view','id'=>$model->inisial),
	'Update',
);

$this->menu=array(
	array('label'=>'List GrupRapat', 'url'=>array('index')),
	array('label'=>'Create GrupRapat', 'url'=>array('create')),
	array('label'=>'View GrupRapat', 'url'=>array('view', 'id'=>$model->inisial)),
	array('label'=>'Manage GrupRapat', 'url'=>array('admin')),
);
?>

<h1>Update GrupRapat <?php echo $model->inisial; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>