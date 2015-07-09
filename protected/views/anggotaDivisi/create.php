<?php
/* @var $this AnggotaDivisiController */
/* @var $model AnggotaDivisi */

$this->breadcrumbs = array(
    'Anggota Divisis' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Divisi', 'url' => array('divisi/index')),
    array('label' => 'List AnggotaDivisi', 'url' => array('index')),
    array('label' => 'Manage AnggotaDivisi', 'url' => array('admin')),
);
?>

<h1>Create AnggotaDivisi</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>