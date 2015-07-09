<?php

/**
 * Description of MailController
 *
 * @author Sitta Endah Pricilia
 */
class MailController extends Controller {

    private $mailer;

    private function initMailer() {
        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');

        $mailer->IsSMTP();
        $mailer->IsHTML(true);
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = "ssl";
        $mailer->Host = "smtp.gmail.com";
        $mailer->Port = 465;
        $mailer->Username = "syp.ti1.01@gmail.com";
        $mailer->Password = 'justatest';
        //$mailer->From = "Jonathan Natanael";
        $mailer->FromName = "SYP_TI1_01";

        return $mailer;
    }

    private function sendEmail($emailAddress, $subject = null, $body = null) {
        $mailer = $this->initMailer();

        if (!$subject) {
            $mailer->Subject = "Meeting Report (testing)";
            $mailer->Body = "just another test by MailController";
        } else {
            $mailer->Subject = $subject;
            $mailer->Body = $body;
        }

        $mailer->AddAddress($emailAddress);

        if ($mailer->Send()) {
            return TRUE;
        } else {
            return false;
        }
    }

    /**
     * Send deadline reminder of a current meeting via email.
     */
    public function actionSendDeadlineReminder($idRapat) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('mail_deadlineReminder')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }
        
        $rapat = Rapat::model()->findByPk($idRapat);

        $agendaRapats = $this->getAgendaRapat($idRapat);
        $agendaRapats = $this->getTempAgendas($agendaRapats);

        $daftarAbsen = AbsenAnggota::model()->findAllByAttributes(array(
            'id_rapat' => $idRapat
        ));

        $subject = '[Deadline Reminder] Rapat' . $rapat->waktu_tanggal;
        $content = 'Waktu : '.$rapat->waktu_tanggal.' </br>';
        $content .= 'Tempat : '.$rapat->tempat.' </br>';
        $content .= 'Jenis Rapat : ' . $rapat->jenisRapat->deskripsi . ' </br>';

        $content .= 'Deadline Agenda : </br>';

        foreach ($agendaRapats as $agenda) {
            if ($agenda->deadline) {
                $content .= '- '.$agenda->topik.' </br>';

                $tamp = $agenda->deadline;

                while ($tamp != null) {
                    $i = 0;
                    $content .= '<br/>';

                    while ($i < 3) {
                        $pos = strpos($tamp, '#');
                        $temp = substr($tamp, 0, $pos);
                        $tamp = substr($tamp, $pos + 1, strlen($tamp) - $pos + 1);

                        $content .= $temp;
                        $content .= "<br/>";

                        $i++;
                    }
                }

                $content .= "<br/>";
            }
        }

        $members = Member::model()->findAll();

        foreach ($members as $member) {
            while ($this->sendEmail($member->email) == false) {
                $this->sendEmail($member->email);
            }
        }

        /* $this->render('deadlineReminder', array(
          'rapat' => $rapat,
          'agendas' => $agendaRapats,
          'daftarAbsen' => $daftarAbsen
          )); */

        $this->redirect(array('site/index'));
    }

    /**
     * Send meeting reminder.
     */
    public function actionSendMeetingReminder($idRapat) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('mail_meetingReminder')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }
        
        $rapat = Rapat::model()->findByPk($idRapat);

        $agendaRapats = $this->getAgendaRapat($idRapat);
        $agendaRapats = $this->getAgendas($agendaRapats);

        $subject = '[Reminder] Rapat' . $rapat->waktu_tanggal;
        $content = $rapat->waktu_tanggal . ', ' . $rapat->tempat . '<br/>';
        $content .= 'Chairperson : ' . $rapat->chairperson0->nama . '<br/>';
        $content .= 'Notulen : ' . $rapat->notulen0->nama . '<br/>';
        $content .= 'Agenda yang akan dibahas : <br/>';
        $i = 1;
        foreach ($agendaRapats as $agendaRapat) {
            $content .= '(' . $i . ') ' . $agendaRapat->topik . '<br/>';
            $i++;
        }

        $members = Member::model()->findAll();
        foreach ($members as $member) {
            while ($this->sendEmail($member->email, $subject, $content) == false) {
                $this->sendEmail($member->email, $subject, $content);
            }
        }

        return true;
    }
    
    /**
     * Send request rejected notification.
     */
    public function actionSendRequestNotification($idRequest) {
        // is current user has the required privilege ?
        /*if (!Yii::app()->user->checkAccess('mail_meetingReminder')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }*/
        
        $request = Request::model()->findByPk($idRequest);

        $subject = '[Notification] Request ditolak';
        $content = 'Melalui email ini, kami menyampaikan bahwa agenda yang Anda ajukan ditolak.<br/>';
        $content .= 'Demikian email ini, terima kasih.<br/>';
        $content .= '<br/>Salam,';
        $content .= '<br/>Admin';

        $members = Member::model()->findAll();
        foreach ($members as $member) {
            while ($this->sendEmail($member->email, $subject, $content) == false) {
                $this->sendEmail($member->email, $subject, $content);
            }
        }

        return true;
    }

    /**
     * Gets agendas of current meeting.
     */
    private function getAgendaRapat($id_rapat) {
        $agendaRapat = AgendaRapat::model()->findAllByAttributes(array(
            'id_rapat' => $id_rapat,
        ));

        return $agendaRapat;
    }

    /** FUNCTION(S) * */

    /**
     * Gets detail of some agendas.
     */
    private function getAgendas($agendaRapats) {
        foreach ($agendaRapats as $agendaRapat) {
            $agenda[] = Agenda::model()->findByPk($agendaRapat->id_agenda);
        }

        return $agenda;
    }

    /**
     * Gets detail of some tempAgendas.
     */
    private function getTempAgendas($agendaRapats) {
        foreach ($agendaRapats as $agendaRapat) {
            $agenda[] = TempAgenda::model()->findByAttributes(array(
                'id_agenda' => $agendaRapat->id_agenda
            ));
        }

        return $agenda;
    }

    /** TESTING * */
    public function actionTestUnicast() {
        $this->sendEmail('sitta.juntak@gmail.com');
        return true;
    }

    public function actionTestBroadcast() {
        $members = Member::model()->findAll();

        foreach ($members as $member) {
            while ($this->sendEmail($member->email) == false) {
                $this->sendEmail($member->email);
            }
        }

        return true;
    }

}
