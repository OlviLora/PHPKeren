<?php
/* @var $this RequestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Requests',
);

$this->menu = array(
    array('label' => 'Create Request', 'url' => array('create')),
    array('label' => 'List Request', 'url' => array('index')),
    array('label' => 'Manage Request', 'url' => array('manage')),
);

?>

<h1>Manage Request</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'book-grid',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => false,
    'columns' => array(
        'id',
        array(
            // the field name to be shown on the table header 
            'name' => 'requester',
            // $data is an alias that refers to a single row data 
            'value' => '$data->idAccount->idMember->nama',
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'topic',
            // $data is an alias that refers to a single row data 
            'value' => '$data->topik',
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
            'name' => 'Status',
            // $data is an alias that refers to a single row data 
            'value' => '$data->status',
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{approve} {reject}',
            'buttons' => array(
                'approve' => array(
                    'label' => 'approve',
                    'url' => 'Yii::app()->controller->createUrl("request/responseRequest",array("id"=>$data->primaryKey, "action"=>"approve"))',
                ),
                'reject' => array(
                    'label' => 'reject',
                    'url' => 'Yii::app()->controller->createUrl("request/responseRequest",array("id"=>$data->primaryKey, "action"=>"reject"))',
                ),
            )
        ),
    ),
));
?>  
