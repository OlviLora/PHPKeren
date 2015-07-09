<?php
/* @var $this KategoriRapatController */
/* @var $model KategoriRapat */

$this->breadcrumbs=array(
	'Kategori Rapats'=>array('index'),
	$model->inisial=>array('view','id'=>$model->inisial),
	'Update',
);

$this->menu=array(
	array('label'=>'List KategoriRapat', 'url'=>array('index')),
	array('label'=>'Create KategoriRapat', 'url'=>array('create')),
	array('label'=>'View KategoriRapat', 'url'=>array('view', 'id'=>$model->inisial)),
	array('label'=>'Manage KategoriRapat', 'url'=>array('admin')),
);
?>

<h1>Update KategoriRapat <?php echo $model->inisial; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>