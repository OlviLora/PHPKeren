<?php
/* @var $this AnggotaDivisiController */
/* @var $model AnggotaDivisi */

$this->breadcrumbs = array(
    'Anggota Divisis' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Divisi', 'url' => array('divisi/index')),
    array('label' => 'List AnggotaDivisi', 'url' => array('index')),
    array('label' => 'Create AnggotaDivisi', 'url' => array('create')),
    array('label' => 'Update AnggotaDivisi', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete AnggotaDivisi', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage AnggotaDivisi', 'url' => array('admin')),
);
?>

<h1>View AnggotaDivisi #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'divisi',
        'id_account',
        'status',
    ),
));
?>
