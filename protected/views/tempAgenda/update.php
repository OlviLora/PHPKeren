<?php
/* @var $this TempAgendaController */
/* @var $model TempAgenda */

$this->breadcrumbs=array(
	'Temp Agendas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TempAgenda', 'url'=>array('index')),
	array('label'=>'Create TempAgenda', 'url'=>array('create')),
	array('label'=>'View TempAgenda', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TempAgenda', 'url'=>array('admin')),
);
?>

<h1>Update TempAgenda <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>