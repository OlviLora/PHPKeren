<?php
/* @var $this AgendaRapatController */
/* @var $model AgendaRapat */

$this->breadcrumbs=array(
	'Agenda Rapats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AgendaRapat', 'url'=>array('index')),
	array('label'=>'Create AgendaRapat', 'url'=>array('create')),
	array('label'=>'Update AgendaRapat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AgendaRapat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AgendaRapat', 'url'=>array('admin')),
);
?>

<h1>View AgendaRapat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_rapat',
		'id_agenda',
	),
)); ?>
