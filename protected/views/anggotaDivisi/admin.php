<?php
/* @var $this AnggotaDivisiController */
/* @var $model AnggotaDivisi */

$this->breadcrumbs = array(
    'Anggota Divisis' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Divisi', 'url' => array('divisi/index')),
    array('label' => 'List AnggotaDivisi', 'url' => array('index')),
    array('label' => 'Create AnggotaDivisi', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#anggota-divisi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Anggota Divisis</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

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
    'id' => 'anggota-divisi-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'divisi',
        //'id_account',
        array(
            // the field name to be shown on the table header 
            'name' => 'Admin',
            // $data is an alias that refers to a single row data 
            'value' => '$data->idAccount->idMember->nama',
            // disable the searchbox for this field 
            'filter' => false
        ),
        'status',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {gantiStatus}',
            'buttons' => array(
                'gantiStatus' => array(
                    'label' => 'ganti status',
                    'url' => 'Yii::app()->controller->createUrl("changeStatus", array("id"=>$data->primaryKey))',
                    /*'click' => <<<EOD
                                function(){
                                confirm('status user akan diganti')
                                }
EOD*/
                ),
            )
        ),
    ),
));
?>
