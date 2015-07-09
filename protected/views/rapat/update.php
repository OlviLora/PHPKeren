<?php
/* @var $this RapatController */
/* @var $model Rapat */

$this->breadcrumbs = array(
    'Rapats' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Create Rapat', 'url' => array('create')),
    array('label' => 'View Rapat', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'List Rapat', 'url' => array('index')),
    array('label' => 'Manage Rapat', 'url' => array('admin')),
);
?>

<h1>Update Rapat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>