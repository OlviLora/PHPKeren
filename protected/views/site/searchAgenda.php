<?php
$this->breadcrumbs = array(
    'Agendas' => array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.btn_topic').click(function(){
	$('.description_field').hide();
        $('.topic_field').fadeIn(500);
	return false;
});
$('.btn_description').click(function(){
        $('.topic_field').hide();
        $('.description_field').fadeIn(500);
	return false;
});
$('.search_field form').submit(function(){
	$('#agenda-list').yiiListView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Search</h1>

<!--<p>
    Please feel free on searching agenda's report based on its <b>topic</b> or <b>description</b>.
</p>-->

<?php
echo CHtml::link('<div class="c">
        <div class="ta">Search by Topic</div>
    </div>', '#', array('class' => 'btn_topic')) . ' ';
echo CHtml::link('<div class="c">
        <div class="ta">Search by Description</div>
    </div>', '#', array('class' => 'btn_description'));
?>

<div style="padding: 20px;"></div>

<div class="topic_field" style="display:none; margin-left: 5px;">
    <?php
    $this->renderPartial('_searchBy', array(
        'model' => $model,
        'criteria' => 'topic'
    ));
    ?>
</div>

<div class="description_field" style="display:none; margin-left: 5px;">
    <?php
    $this->renderPartial('_searchBy', array(
        'model' => $model,
        'criteria' => 'description'
    ));
    ?>
</div>

<div id="search_result" style="height: 280px;">
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'id' => 'agenda_list',
        'dataProvider' => $model->search(),
        'itemView' => '_searchView',
    ));
    ?>
</div>