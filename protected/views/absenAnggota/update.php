<?php
/* @var $this AbsenAnggotaController */
/* @var $model AbsenAnggota */

$this->breadcrumbs=array(
	'Absen Anggotas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AbsenAnggota', 'url'=>array('index')),
	array('label'=>'Create AbsenAnggota', 'url'=>array('create')),
	array('label'=>'View AbsenAnggota', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AbsenAnggota', 'url'=>array('admin')),
);
?>

<h1>Update AbsenAnggota <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>