<?php
/* @var $this GrupRapatController */
/* @var $model GrupRapat */

$this->breadcrumbs = array(
    'Grup Rapats' => array('index'),
    $model->inisial,
);

$this->menu = array(
    array('label' => 'List GrupRapat', 'url' => array('index')),
    array('label' => 'Create GrupRapat', 'url' => array('create')),
    array('label' => 'Update GrupRapat', 'url' => array('update', 'id' => $model->inisial)),
    array('label' => 'Delete GrupRapat', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->inisial), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage GrupRapat', 'url' => array('admin')),
);
?>

<h1>View GrupRapat #<?php echo $model->inisial; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'inisial',
        'deskripsi',
        'milis',
    ),
));
?>
