<?php
/* @var $agendas Agenda[] */
/* @var $role role */

if ($role == 'chairperson') {
    $url = "&actor=chairperson";
} else if ($role == 'notulen') {
    $url = "&actor=notulen";
}
if ($role == 'member') {
    $url = "";
}
?>

<table>
    <?php
    echo '<b>Previous Minutes</b>';
    echo '<table>';
    foreach ($agendas as $singleAgenda) {
        if ($singleAgenda->status != 'NEW') {
            if ($singleAgenda->status == 'IPG') {
                echo '<tr><td>';
                echo Chtml::ajaxLink($singleAgenda->topik, array("changeForm&id=$singleAgenda->id" . $url), array('update' => '#meeting_form'));
                echo '</td><td width="10">';
                echo '</td><td>';
                echo $singleAgenda->status;
                echo '</td></tr>';
            } else if ($singleAgenda->status == 'PND') {
                echo '<tr><td>';
                echo Chtml::ajaxLink($singleAgenda->topik, array("changeForm&id=$singleAgenda->id" . $url), array('update' => '#meeting_form'));
                echo '</td><td width="10">';
                echo '</td><td>';
                echo $singleAgenda->status;
                echo '</td></tr>';
            } else if ($singleAgenda->status == 'OPN') {
                echo '<tr><td>';
                echo Chtml::ajaxLink($singleAgenda->topik, array("changeForm&id=$singleAgenda->id" . $url), array('update' => '#meeting_form'));
                echo '</td><td width="10">';
                echo '</td><td>';
                echo $singleAgenda->status;
                echo '</td></tr>';
            }
        }
    }
    echo '</table>';
    echo '<b>Agenda to be discussed</b>';
    echo '<table>';
    foreach ($agendas as $singleAgenda) {
        if ($singleAgenda->status == 'NEW') {
            echo '<tr><td>';
            echo Chtml::ajaxLink($singleAgenda->topik, array("changeForm&id=$singleAgenda->id" . $url), array('update' => '#meeting_form'));
            echo '</td><td width="10">';
            echo '</td><td>';
            echo $singleAgenda->status;
            echo '</td></tr>';
        }
    }
    echo '</table>';
    echo '<b>Briefing from Rector</b></br>';
    echo '<b>Miscellanous</b>';
    ?>
</table>