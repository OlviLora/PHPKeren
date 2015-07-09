<?php
/* @var $this TempAgendaController */
/* @var $model TempAgenda */

$this->breadcrumbs=array(
	'Temp Agendas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TempAgenda', 'url'=>array('index')),
	array('label'=>'Create TempAgenda', 'url'=>array('create')),
	array('label'=>'Update TempAgenda', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TempAgenda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TempAgenda', 'url'=>array('admin')),
);
?>

<h1>View TempAgenda #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_agenda',
		'tanggal',
		'catatan',
		'keputusan',
	),
)); ?>
