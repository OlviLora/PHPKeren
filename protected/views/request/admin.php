<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs = array(
    'Requests' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Request', 'url' => array('create')),
    array('label' => 'List Request', 'url' => array('index')),
    array('label' => 'Manage Request', 'url' => array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#request-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Requests</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'request-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'id_account',
        'topik',
        'deskripsi',
        'status',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>  
