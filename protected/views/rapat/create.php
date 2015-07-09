<?php
/* @var $this RapatController */
/* @var $model Rapat */
/* @var $agendaController AgendaController */

$this->breadcrumbs = array(
    'Rapats' => array('index'),
    'Create',
);

$auth = Yii::app()->db->createCommand()
        ->select('itemname')
        ->from('authassignment')
        ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
        ->queryRow();
if ($auth['itemname'] === 'admin') {
    $this->menu = array(
        array('label' => 'List Rapat', 'url' => array('index')),
        array('label' => 'Manage Rapat', 'url' => array('admin')),
    );
} else {
    $this->menu = array(
        array('label' => 'List Rapat', 'url' => array('index')),
    );
}
?>

<h1>Create Rapat</h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    //'agendaController' => $agendaController,
    'agendaForm' => $agendaForm,
    'jenisRapat' => $jenisRapat
));
?>