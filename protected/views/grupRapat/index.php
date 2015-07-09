<?php
/* @var $this GrupRapatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grup Rapats',
);

$this->menu=array(
	array('label'=>'Create GrupRapat', 'url'=>array('create')),
	array('label'=>'Manage GrupRapat', 'url'=>array('admin')),
);
?>

<h1>Grup Rapats</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'group-grid',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => false,
    'type' => 'hover',
    'columns' => array(
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
        array(
            // the field name to be shown on the table header 
            'name' => 'Milis',
            // $data is an alias that refers to a single row data 
            'value' => '$data->milis',
            // disable the searchbox for this field 
            'filter' => false
        ),
    ),
)); ?>
