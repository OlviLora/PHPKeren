<?php
/* @var $this RapatController */
/* @var $model Rapat */

$this->breadcrumbs = array(
    'Rapats' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Rapat', 'url' => array('create')),
    array('label' => 'List Rapat', 'url' => array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rapat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Rapats</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'rapat-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'type' => 'hover',
    'columns' => array(
        'id',
        'waktu_tanggal',
        'tempat',
        'jenis_rapat',
        'chairperson',
        'notulen',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
