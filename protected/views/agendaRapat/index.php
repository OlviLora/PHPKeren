<?php
/* @var $this AgendaRapatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Agenda Rapats',
);

$this->menu=array(
	array('label'=>'Create AgendaRapat', 'url'=>array('create')),
	array('label'=>'Manage AgendaRapat', 'url'=>array('admin')),
);
?>

<h1>Agenda Rapats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
