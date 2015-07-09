<?php
/* @var $this AnggotaDivisiController */
/* @var $model AnggotaDivisi */

$this->breadcrumbs = array(
    'Anggota Divisis' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Divisi', 'url' => array('divisi/index')),
    array('label' => 'List AnggotaDivisi', 'url' => array('index')),
    array('label' => 'Create AnggotaDivisi', 'url' => array('create')),
    array('label' => 'View AnggotaDivisi', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage AnggotaDivisi', 'url' => array('admin')),
);
?>

<h1>Update AnggotaDivisi <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>