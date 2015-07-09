<?php
/* @var $this KategoriRapatController */
/* @var $model KategoriRapat */

$this->breadcrumbs=array(
	'Kategori Rapats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KategoriRapat', 'url'=>array('index')),
	array('label'=>'Manage KategoriRapat', 'url'=>array('admin')),
);
?>

<h1>Create KategoriRapat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>