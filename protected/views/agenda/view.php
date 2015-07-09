<?php
/* @var $this AgendaController */
/* @var $model Agenda */

$this->breadcrumbs = array(
    'Agendas' => array('index'),
    $model->id,
);
$auth = Yii::app()->db->createCommand()
        ->select('itemname')
        ->from('authassignment')
        ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
        ->queryRow();
if ($auth['itemname'] === 'admin') {
    $this->menu = array(
        array('label' => 'List Agenda', 'url' => array('index')),
        array('label' => 'Create Agenda', 'url' => array('create')),
        array('label' => 'Update Agenda', 'url' => array('update', 'id' => $model->id)),
        array('label' => 'Delete Agenda', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        array('label' => 'Manage Agenda', 'url' => array('admin')),
    );
} else {
    $this->menu = array(
        array('label' => 'List Agenda', 'url' => array('index')),
        array('label' => 'Create Agenda', 'url' => array('create')),
    );
}
?>

<h1>View Agenda #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'PIC',
        'topik',
        'deskripsi',
        'status',
        'jenis_rapat',
        'hasil',
    ),
));
?>
