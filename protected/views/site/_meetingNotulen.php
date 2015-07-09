<?php
/* @var $this SiteController */
/* @var $meetingForm MeetingForm */
/* @var $deadlineForm DeadlineForm */
/* @var $rapat Rapat */
/* @var $agendas Agenda[] */
?>

<div id="meeting_form" class="span8">
    <?php
    $this->renderPartial('__notulenForm', array(
        'meetingForm' => $meetingForm,
        'agenda' => $agenda,
        'tempAgenda' => $tempAgenda
    ));
    /*$this->renderPartial('__deadlineForm', array(
        'deadlineForm' => $deadlineForm,
        'currentAgenda' => $agenda
    ));*/
    ?>
</div>
<div class="span4">
    <div class="conts" style="padding-bottom: 20px;">
        <div id="agenda_menu">
            <h1>Agenda(s)</h1>
            <?php
            $this->renderPartial('__agendaMenu', array(
                'agendas' => $agendas,
                'role' => $role
            ));
            ?>
        </div>
    </div>
    <div style="padding: 10px;"></div>
    <div id="deadline_form">
        <?php echo $this->renderPartial('__deadlineForm', array('deadlineForm' => $deadlineForm)); ?>
    </div>
</div>