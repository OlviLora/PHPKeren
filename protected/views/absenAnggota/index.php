<?php
/* @var $this AbsenAnggotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Absen Anggotas',
);

$this->menu=array(
	array('label'=>'Create AbsenAnggota', 'url'=>array('create')),
	array('label'=>'Manage AbsenAnggota', 'url'=>array('admin')),
);
?>

<h1>Absen Anggotas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
