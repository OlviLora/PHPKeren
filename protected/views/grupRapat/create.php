<?php
/* @var $this GrupRapatController */
/* @var $model GrupRapat */

$this->breadcrumbs=array(
	'Grup Rapats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GrupRapat', 'url'=>array('index')),
	array('label'=>'Manage GrupRapat', 'url'=>array('admin')),
);
?>

<h1>Create GrupRapat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>