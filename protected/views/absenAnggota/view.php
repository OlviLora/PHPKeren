<?php
/* @var $this AbsenAnggotaController */
/* @var $model AbsenAnggota */

$this->breadcrumbs=array(
	'Absen Anggotas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AbsenAnggota', 'url'=>array('index')),
	array('label'=>'Create AbsenAnggota', 'url'=>array('create')),
	array('label'=>'Update AbsenAnggota', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AbsenAnggota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AbsenAnggota', 'url'=>array('admin')),
);
?>

<h1>View AbsenAnggota #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_rapat',
		'id_account',
		'inisial_jabatan',
		'status',
		'keterangan',
	),
)); ?>
