<?php
/* @var $this RapatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Rapats',
);

$auth = Yii::app()->db->createCommand()
        ->select('itemname')
        ->from('authassignment')
        ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
        ->queryRow();
if ($auth['itemname'] === 'admin') {
    $this->menu = array(
        array('label' => 'Create Rapat', 'url' => array('create')),
        array('label' => 'Manage Rapat', 'url' => array('admin')),
    );
} else {
    $this->menu = array(
        array('label' => 'Create Rapat', 'url' => array('create')),
    );
}
?>

<h1>Rapats</h1>

<?php
if ($auth['itemname'] === 'admin') {
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'meeting-grid',
        'dataProvider' => $dataProvider,
        'ajaxUpdate' => false,
        'type' => 'hover',
        'columns' => array(
            'id',
            array(
                // the field name to be shown on the table header 
                'name' => 'Waktu',
                // $data is an alias that refers to a single row data 
                'value' => '$data->waktu_tanggal',
                // disable the searchbox for this field 
                'filter' => false
            ),
            array(
                // the field name to be shown on the table header 
                'name' => 'Tempat',
                // $data is an alias that refers to a single row data 
                'value' => '$data->tempat',
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
            array(
                // the field name to be shown on the table header 
                'name' => 'Chairperson',
                // $data is an alias that refers to a single row data 
                'value' => '$data->chairperson0->nama',
                // disable the searchbox for this field 
                'filter' => false
            ),
            array(
                // the field name to be shown on the table header 
                'name' => 'Notulen',
                // $data is an alias that refers to a single row data 
                'value' => '$data->notulen0->nama',
                // disable the searchbox for this field 
                'filter' => false
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{reminder} {report}',
                'buttons' => array(
                    'reminder' => array(
                        'label' => '<div class="send"><font color="white">.</font></div>',
                        'url' => 'Yii::app()->controller->createUrl("mail/sendMeetingReminder",array("idRapat"=>$data->primaryKey))',
                    ),
                    'report' => array(
                        'label' => 'MoM',
                        'url' => 'Yii::app()->controller->createUrl("htmlToPdf/report",array("idRapat"=>$data->primaryKey))',
                    ),
                )
            ),
        ),
    ));
} else {
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'meeting-grid',
        'dataProvider' => $dataProvider,
        'ajaxUpdate' => false,
        'type' => 'hover',
        'columns' => array(
            'id',
            array(
                // the field name to be shown on the table header 
                'name' => 'Waktu',
                // $data is an alias that refers to a single row data 
                'value' => '$data->waktu_tanggal',
                // disable the searchbox for this field 
                'filter' => false
            ),
            array(
                // the field name to be shown on the table header 
                'name' => 'Tempat',
                // $data is an alias that refers to a single row data 
                'value' => '$data->tempat',
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
            array(
                // the field name to be shown on the table header 
                'name' => 'Chairperson',
                // $data is an alias that refers to a single row data 
                'value' => '$data->chairperson0->nama',
                // disable the searchbox for this field 
                'filter' => false
            ),
            array(
                // the field name to be shown on the table header 
                'name' => 'Notulen',
                // $data is an alias that refers to a single row data 
                'value' => '$data->notulen0->nama',
                // disable the searchbox for this field 
                'filter' => false
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{report}',
                'buttons' => array(
                    'report' => array(
                        'label' => 'MoM',
                        'url' => 'Yii::app()->controller->createUrl("htmlToPdf/report",array("idRapat"=>$data->primaryKey))',
                    ),
                )
            ),
        ),
    ));
}
?>
