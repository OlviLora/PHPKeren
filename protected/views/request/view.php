<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs = array(
    'Requests' => array('index'),
    $model->id,
);

$auth = Yii::app()->db->createCommand()
        ->select('itemname')
        ->from('authassignment')
        ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
        ->queryRow();
if ($auth['itemname'] === 'admin') {
    $this->menu = array(
        array('label' => 'Create Request', 'url' => array('create')),
        array('label' => 'Update Request', 'url' => array('update', 'id' => $model->id)),
        array('label' => 'Delete Request', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
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

<h1>View Request #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        //'id_account',
        'topik',
        'deskripsi',
        array(
            // the field name to be shown on the table header 
            'name' => 'Jenis Rapat',
            // $data is an alias that refers to a single row data 
            'value' => $model->jenisRapat->deskripsi,
            // disable the searchbox for this field 
            'filter' => false
        ),
        'status',
    ),
));

$this->renderPartial('_choosePIC', array(
    'picForm' => $picForm
));
?>
