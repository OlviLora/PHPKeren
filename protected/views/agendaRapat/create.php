<?php
/* @var $this AgendaRapatController */
/* @var $model AgendaRapat */

$this->breadcrumbs=array(
	'Agenda Rapats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AgendaRapat', 'url'=>array('index')),
	array('label'=>'Manage AgendaRapat', 'url'=>array('admin')),
);
?>

<h1>Create AgendaRapat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>