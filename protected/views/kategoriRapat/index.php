<?php
/* @var $this KategoriRapatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Kategori Rapats',
);

$this->menu = array(
    array('label' => 'Create KategoriRapat', 'url' => array('create')),
    array('label' => 'Manage KategoriRapat', 'url' => array('admin')),
);
?>

<h1>Kategori Rapats</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'type-grid',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => false,
    'type' => 'hover',
    'columns' => array(
        'id',
        array(
            // the field name to be shown on the table header 
            'name' => 'Inisial',
            // $data is an alias that refers to a single row data 
            'value' => '$data->inisial',
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'Deskripsi',
            // $data is an alias that refers to a single row data 
            'value' => '$data->deskripsi',
            // disable the searchbox for this field 
            'filter' => false
        ),
    ),
));
?>
