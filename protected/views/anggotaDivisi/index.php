<?php
/* @var $this AnggotaDivisiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Anggota Divisis',
);

$this->menu = array(
    array('label' => 'List Divisi', 'url' => array('divisi/index')),
    array('label' => 'Create AnggotaDivisi', 'url' => array('create')),
    array('label' => 'Manage AnggotaDivisi', 'url' => array('admin')),
);
?>

<h1>Anggota Divisis</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
