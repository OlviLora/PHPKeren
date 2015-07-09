<h3>Menu</h3>

<!--<ul class="nav nav-list">
    <li class="active"><a href="index.php?r=agenda/create">Create Agenda</a></li>
    <li><a href="index.php?r=agenda/admin">Manage Agenda</a></li>
</ul>-->

<?php
$this->beginWidget('zii.widgets.CMenu', array(
    'items' => $this->menu,
    'htmlOptions' => array('class' => 'operations'),
));
$this->endWidget();
?>