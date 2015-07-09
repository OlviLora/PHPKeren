<?php
/* @var $this StatusAgendaController */
/* @var $model StatusAgenda */

$this->breadcrumbs=array(
	'Status Agendas'=>array('index'),
	$model->inisial,
);

$this->menu=array(
	array('label'=>'List StatusAgenda', 'url'=>array('index')),
	array('label'=>'Create StatusAgenda', 'url'=>array('create')),
	array('label'=>'Update StatusAgenda', 'url'=>array('update', 'id'=>$model->inisial)),
	array('label'=>'Delete StatusAgenda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->inisial),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusAgenda', 'url'=>array('admin')),
);
?>

<h1>View StatusAgenda #<?php echo $model->inisial; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'inisial',
		'deskripsi',
	),
)); ?>
