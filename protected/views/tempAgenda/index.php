<?php
/* @var $this TempAgendaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Temp Agendas',
);

$this->menu=array(
	array('label'=>'Create TempAgenda', 'url'=>array('create')),
	array('label'=>'Manage TempAgenda', 'url'=>array('admin')),
);
?>

<h1>Temp Agendas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
