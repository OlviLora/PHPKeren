<?php
/* @var $this SiteController */
/* @var $meetingForm MeetingForm */
/* @var $rapat Rapat */
/* @var $agendas Agenda[] */
/* @var $agenda Agenda[0] */
?>

<div id="meeting_form" class="span8">
    <?php
    $this->renderPartial('__meetingForm', array(
        'meetingForm' => $meetingForm,
        'agenda' => $agenda,
        'decision' => 'meeting.php'
    ))
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
</div>