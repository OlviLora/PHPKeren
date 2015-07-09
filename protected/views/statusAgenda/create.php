<?php
/* @var $this StatusAgendaController */
/* @var $model StatusAgenda */

$this->breadcrumbs=array(
	'Status Agendas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusAgenda', 'url'=>array('index')),
	array('label'=>'Manage StatusAgenda', 'url'=>array('admin')),
);
?>

<h1>Create StatusAgenda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>