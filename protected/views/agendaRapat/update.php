<?php
/* @var $this AgendaRapatController */
/* @var $model AgendaRapat */

$this->breadcrumbs=array(
	'Agenda Rapats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AgendaRapat', 'url'=>array('index')),
	array('label'=>'Create AgendaRapat', 'url'=>array('create')),
	array('label'=>'View AgendaRapat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AgendaRapat', 'url'=>array('admin')),
);
?>

<h1>Update AgendaRapat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>