<?php
/* @var $this _form */
/* @var $meetingForm MeetingForm */
/* @var $deadlineForm DeadlineForm */
/* @var $rapat Rapat */
/* @var $agendas Agenda[] */
/* @var $agenda Agenda[0] */
/* @var $role role */

$temp = Yii::app()->createController('site'); // returns array containing controller instance and action index
$siteController = $temp[0];                   // get the controller instance.

$role = $siteController->checkStatusMember($siteController->getMemberId(Yii::app()->user->id), $rapat->id);

$siteController->flagAttendance($rapat->id, $role);
?>

<div class="met" align="center">Meeting</div> 
<div align="center">
    <h2>
        for 
        <?php
        if ($role == 'notulen') {
            echo 'Notulen';
        } else if ($role == 'chairperson') {
            echo 'Chairperson';
        } else if ($role == 'member') {
            echo 'Member';
        } else {
            echo 'gak ada';
        }
        ?>
    </h2>
</div>

<div class="row-fluid">
    <?php
    if ($role == 'notulen') {
        $this->renderPartial('_meetingNotulen', array(
            'meetingForm' => $meetingForm,
            'deadlineForm' => $deadlineForm,
            'rapat' => $rapat,
            'agendas' => $agendas,
            'agenda' => $agenda,
            'tempAgenda' => $tempAgenda,
            'role' => $role
        ));
    } else if ($role == 'chairperson') {
        $this->renderPartial('_meetingPIC', array(
            'meetingForm' => $meetingForm,
            'rapat' => $rapat,
            'agendas' => $agendas,
            'agenda' => $agenda,
            'tempAgenda' => $tempAgenda,
            'role' => $role
        ));
    } else {
        $this->renderPartial('_meetingMember', array(
            'meetingForm' => $meetingForm,
            'rapat' => $rapat,
            'agendas' => $agendas,
            'agenda' => $agenda,
            'tempAgenda' => $tempAgenda,
            'role' => $role
        ));
    }
    ?>
</div>

<?php if ($role == 'chairperson') { ?>
    <div style="padding: 10px;"></div>
    <div class="b">
        <div class="ta">
            <h3>
                <?php echo Chtml::link('End Rapat', "index.php?r=site/endMeeting&idRapat=$rapat->id"); ?>
            </h3>
        </div>
    </div>
<?php } ?>