<?php
/* @var $this MemberController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Members',
);

$this->menu=array(
	array('label'=>'Create Member', 'url'=>array('create')),
	array('label'=>'Manage Member', 'url'=>array('admin')),
);
?>

<h1>Members</h1>

<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'member-grid',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => false,
    'type' => 'hover',
    'columns' => array(
        'id',
        array(
            // the field name to be shown on the table header 
            'name' => 'NIDN',
            // $data is an alias that refers to a single row data 
            'value' => '$data->NIDN',
            // disable the searchbox for this field 
            'filter' => false
        ),
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
            'name' => 'Nama',
            // $data is an alias that refers to a single row data 
            'value' => '$data->nama',
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'Email',
            // $data is an alias that refers to a single row data 
            'value' => '$data->email',
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'Telepon',
            // $data is an alias that refers to a single row data 
            'value' => '$data->telepon',
            // disable the searchbox for this field 
            'filter' => false
        ),
    ),
));
?>
