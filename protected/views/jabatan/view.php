<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs=array(
	'Jabatans'=>array('index'),
	$model->inisial,
);

$this->menu=array(
	array('label'=>'List Jabatan', 'url'=>array('index')),
	array('label'=>'Create Jabatan', 'url'=>array('create')),
	array('label'=>'Update Jabatan', 'url'=>array('update', 'id'=>$model->inisial)),
	array('label'=>'Delete Jabatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->inisial),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jabatan', 'url'=>array('admin')),
);
?>

<h1>View Jabatan #<?php echo $model->inisial; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'inisial',
		'deskripsi',
	),
)); ?>
