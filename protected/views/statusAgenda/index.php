<?php
/* @var $this StatusAgendaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Status Agendas',
);

$this->menu=array(
	array('label'=>'Create StatusAgenda', 'url'=>array('create')),
	array('label'=>'Manage StatusAgenda', 'url'=>array('admin')),
);
?>

<h1>Status Agendas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
