<?php
/* @var $this RequestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Requests',
);

$auth = Yii::app()->db->createCommand()
        ->select('itemname')
        ->from('authassignment')
        ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
        ->queryRow();
if ($auth['itemname'] === 'admin') {
    $this->menu = array(
        array('label' => 'Create Request', 'url' => array('create')),
        array('label' => 'List Request', 'url' => array('index')),
        array('label' => 'Manage Request', 'url' => array('manage')),
    );
} else {
    $this->menu = array(
        array('label' => 'Create Request', 'url' => array('create')),
        array('label' => 'List Request', 'url' => array('index')),
    );
}
?>

<h1>Requests</h1>

<?php
/* $this->widget('zii.widgets.CListView', array(
  'dataProvider'=>$dataProvider,
  'itemView'=>'_view',
  )); */

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'request-grid',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => false,
    'type' => 'hover',
    'columns' => array(
        'id',
        array(
            // the field name to be shown on the table header 
            'name' => 'Pemohon',
            // $data is an alias that refers to a single row data 
            'value' => '$data->idAccount->idMember->nama',
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'Topik',
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
            // the field name to be shown on the table header 
            'name' => 'Jenis Rapat',
            // $data is an alias that refers to a single row data 
            'value' => '$data->jenisRapat->deskripsi',
            // disable the searchbox for this field 
            'filter' => false
        ),
    ),
));
?>
