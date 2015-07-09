<?php
/* @var $this DivisiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Divisis',
);

$this->menu = array(
    array('label' => 'Create Divisi', 'url' => array('create')),
    array('label' => 'Manage Divisi', 'url' => array('admin')),
);
?>

<h1>Divisis</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => false,
    'type' => 'hover',
    'columns' => array(
        array(
            // the field name to be shown on the table header 
            'name' => 'nama',
            // $data is an alias that refers to a single row data 
            'value' => '$data->nama',
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'keterangan',
            // $data is an alias that refers to a single row data 
            'value' => '$data->keterangan',
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'milis',
            // $data is an alias that refers to a single row data 
            'value' => '$data->milis',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{daftarAdmin}',
            'buttons' => array(
                'daftarAdmin' => array(
                    'label' => 'daftar admin',
                    'url' => 'Yii::app()->controller->createUrl("anggotaDivisi/admin")',
                ),
            )
        ),
    ),
));
?>
