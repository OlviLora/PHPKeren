<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs = array(
    'Requests' => array('index'),
    'Create',
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

<h1>Create Request</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>