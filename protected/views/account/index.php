<?php
/* @var $this AccountController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounts',
);

$this->menu=array(
	array('label'=>'Create Account', 'url'=>array('create')),
	array('label'=>'Manage Account', 'url'=>array('admin')),
);
?>

<h1>Accounts</h1>

<?php 
/*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'agenda-grid',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => false,
    'type' => 'hover',
    'columns' => array(
        'id',
        array(
            // the field name to be shown on the table header 
            'name' => 'Nama',
            // $data is an alias that refers to a single row data 
            //'value' => '$this->getAccount($data->PIC)->idMember->nama',
            'value' => '$data->id_member ? $data->idMember->nama : null',
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'Username',
            // $data is an alias that refers to a single row data 
            //'value' => '$this->getAccount($data->PIC)->idMember->nama',
            'value' => '$data->username',
            // disable the searchbox for this field 
            'filter' => false
        ),
    ),
));
?>
