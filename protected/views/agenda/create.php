<?php
/* @var $this AgendaController */
/* @var $model Agenda */

$this->breadcrumbs = array(
    'Agendas' => array('index'),
    'Create',
);

$auth = Yii::app()->db->createCommand()
        ->select('itemname')
        ->from('authassignment')
        ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
        ->queryRow();
if ($auth['itemname'] === 'admin') {
    $this->menu = array(
        array('label' => 'List Agenda', 'url' => array('index')),
        array('label' => 'Manage Agenda', 'url' => array('admin')),
    );
} else {
    $this->menu = array(
        array('label' => 'List Agenda', 'url' => array('index')),
    );
}
?>

<h1>Create Agenda</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>