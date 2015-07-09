<?php
/* @var $this RapatController */
/* @var $model Rapat */

$this->breadcrumbs = array(
    'Rapats' => array('index'),
    $model->id,
);

$auth = Yii::app()->db->createCommand()
        ->select('itemname')
        ->from('authassignment')
        ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
        ->queryRow();
if ($auth['itemname'] === 'admin') {
    $this->menu = array(
        array('label' => 'Create Rapat', 'url' => array('create')),
        array('label' => 'Update Rapat', 'url' => array('update', 'id' => $model->id)),
        array('label' => 'Delete Rapat', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => 'List Rapat', 'url' => array('index')),
        array('label' => 'Manage Rapat', 'url' => array('admin')),
    );
} else {
    $this->menu = array(
        array('label' => 'Create Rapat', 'url' => array('create')),
        array('label' => 'List Rapat', 'url' => array('index')),
    );
}
?>

<h1>View Rapat #<?php echo $model->id; ?></h1>

<?php
$content = '';
$i = 1;
foreach ($agendas as $agenda) {
    $content .= '(' . $i . ') ' . $agenda->idAgenda->topik . ' ['.$agenda->idAgenda->pIC->inisial.'] ';
    $i++;
}

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        'waktu_tanggal',
        'tempat',
        array(
            // the field name to be shown on the table header 
            'name' => 'Jenis Rapat',
            // $data is an alias that refers to a single row data 
            'value' => $model->jenisRapat->deskripsi,
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'Chairperson',
            // $data is an alias that refers to a single row data 
            'value' => $model->chairperson0->nama,
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'Notulen',
            // $data is an alias that refers to a single row data 
            'value' => $model->notulen0->nama,
            // disable the searchbox for this field 
            'filter' => false
        ),
        array(
            // the field name to be shown on the table header 
            'name' => 'Agenda',
            // $data is an alias that refers to a single row data 
            'value' => $content,
            // disable the searchbox for this field 
            'filter' => false
        ),
    ),
));
?>
