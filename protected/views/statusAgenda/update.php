<?php
/* @var $this StatusAgendaController */
/* @var $model StatusAgenda */

$this->breadcrumbs=array(
	'Status Agendas'=>array('index'),
	$model->inisial=>array('view','id'=>$model->inisial),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusAgenda', 'url'=>array('index')),
	array('label'=>'Create StatusAgenda', 'url'=>array('create')),
	array('label'=>'View StatusAgenda', 'url'=>array('view', 'id'=>$model->inisial)),
	array('label'=>'Manage StatusAgenda', 'url'=>array('admin')),
);
?>

<h1>Update StatusAgenda <?php echo $model->inisial; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>