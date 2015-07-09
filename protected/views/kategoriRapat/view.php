<?php
/* @var $this KategoriRapatController */
/* @var $model KategoriRapat */

$this->breadcrumbs = array(
    'Kategori Rapats' => array('index'),
    $model->inisial,
);

$this->menu = array(
    array('label' => 'List KategoriRapat', 'url' => array('index')),
    array('label' => 'Create KategoriRapat', 'url' => array('create')),
    array('label' => 'Update KategoriRapat', 'url' => array('update', 'id' => $model->inisial)),
    array('label' => 'Delete KategoriRapat', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->inisial), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage KategoriRapat', 'url' => array('admin')),
);
?>

<h1>View KategoriRapat #<?php echo $model->inisial; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'inisial',
        'deskripsi',
    ),
));
?>
