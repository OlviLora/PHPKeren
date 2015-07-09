<?php
/* @var $this AgendaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Agendas',
);

$auth = Yii::app()->db->createCommand()
        ->select('itemname')
        ->from('authassignment')
        ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
        ->queryRow();
if ($auth['itemname'] === 'admin') {
    $this->menu = array(
        array('label' => 'Create Agenda', 'url' => array('create')),
        array('label' => 'Manage Agenda', 'url' => array('admin')),
    );
} else {
    $this->menu = array(
        array('label' => 'Create Agenda', 'url' => array('create')),
    );
}
?>

<h1>Agendas</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'agenda-grid',
    'dataProvider' => $dataProvider,
    'ajaxUpdate' => false,
    'type' => 'hover',
    'columns' => array(
        'id',
        array(
            // the field name to be shown on the table header 
            'name' => 'PIC',
            // $data is an alias that refers to a single row data 
            //'value' => '$this->getAccount($data->PIC)->idMember->nama',
            'value' => '$data->pIC->nama',
            // disable the searchbox for this field 
            'filter' => false
        ),
        'topik',
        'deskripsi',
        'status'
    ),
));
?>
