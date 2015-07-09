<?php
/* @var $this SiteController */
/* @var $meetingForm MeetingForm */
/* @var $rapat Rapat */
/* @var $agendas Agenda[] */
/* @var $agenda Agenda[0] */
?>

<div class="span8">
    <div id="meeting_form">
        <?php
        $this->renderPartial('__meetingForm', array(
            'meetingForm' => $meetingForm,
            'agenda' => $agenda,
            'decision' => 'meeting.php'
        ));

        $this->renderPartial('__statusForm', array(
            'currentAgenda' => $agenda,
        ));
        ?>
    </div>

</div>
<div class="span4">
    <div class="conts" style="padding-bottom: 20px;">
        <h1>Agenda(s)</h1>
        <div id="agenda_menu">
            <?php
            $this->renderPartial('__agendaMenu', array(
                'agendas' => $agendas,
                'role' => $role
            ));
            ?>
        </div>
    </div>
    <div style="padding: 10px;"></div>
    <?php
    /* $this->renderPartial('__statusForm', array(
      'currentAgenda' => $agenda,
      'rapat' => $rapat
      )); */
    ?>
</div>
