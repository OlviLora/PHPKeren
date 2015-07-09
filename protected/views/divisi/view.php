<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->breadcrumbs = array(
    'Divisis' => array('index'),
    $model->nama,
);

$this->menu = array(
    array('label' => 'List Divisi', 'url' => array('index')),
    array('label' => 'Create Divisi', 'url' => array('create')),
    array('label' => 'Update Divisi', 'url' => array('update', 'id' => $model->nama)),
    array('label' => 'Delete Divisi', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->nama), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Divisi', 'url' => array('admin')),
);
?>

<h1>View Divisi #<?php echo $model->nama; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'nama',
        'keterangan',
        'milis',
    ),
));
?>
