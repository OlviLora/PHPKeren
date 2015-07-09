<?php
/* @var $this TempAgendaController */
/* @var $model TempAgenda */

$this->breadcrumbs=array(
	'Temp Agendas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TempAgenda', 'url'=>array('index')),
	array('label'=>'Manage TempAgenda', 'url'=>array('admin')),
);
?>

<h1>Create TempAgenda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>