<?php
/* @var $this AbsenAnggotaController */
/* @var $model AbsenAnggota */

$this->breadcrumbs=array(
	'Absen Anggotas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AbsenAnggota', 'url'=>array('index')),
	array('label'=>'Manage AbsenAnggota', 'url'=>array('admin')),
);
?>

<h1>Create AbsenAnggota</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>