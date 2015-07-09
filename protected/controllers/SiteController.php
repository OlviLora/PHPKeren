<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        if (Yii::app()->user->isGuest) {
            $this->redirect(array('site/login'));
        }
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('login')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('site_logout')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /*     * ** SYP_TI1_01 *** */

    /**
     * Registers new member
     */
    public function actionRegister() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('site_register')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $registration = new RegistrationForm;

        // collect user input data 
        if (isset($_POST['RegistrationForm'])) {
            $registration->attributes = $_POST['RegistrationForm'];
            print_r($_POST['RegistrationForm']);
            // validate user input and redirect to the previous page if valid 
            if ($registration->validate()) {
                $member = new Member;
                $member->attributes = $registration->attributes;

                if ($member->save()) {
                    // create an account model
                    $account = new Account;
                    $account->username = $registration->username;
                    $account->password = $registration->password;
                    $account->id_member = $member->id;

                    if ($account->save()) {
                        $auth = Yii::app()->authManager;
                        $auth->assign('member', (int)$account->id);
                        
                        // redirects to index page
                        //$this->redirect(array('index'));
                    } else {
                        // what's wrong? get the error message
                        $registration->addErrors($member->getErrors());
                    }
                } else {
                    // what's wrong? get the error message
                    $registration->addErrors($account->getErrors());
                }
            }
        }
        // display the registration form 
        $this->render('register', array('model' => $registration));
    }

    // MEETING

    /**
     * record meeting member's attendance
     */
    public function flagAttendance($idRapat, $role) {
        $absen = AbsenAnggota::model()->findByAttributes(array(
            'id_rapat' => $idRapat,
            'id_account' => Yii::app()->user->id
        ));

        if (!$absen) {
            $absen = new AbsenAnggota;

            $absen->id_rapat = $idRapat;
            $absen->id_account = Yii::app()->user->id;

            if ($role == 'chairperson') {
                $absen->inisial_jabatan = 'CHP';
            } else if ($role == 'notulen') {
                $absen->inisial_jabatan = 'NTL';
            } else {
                $absen->inisial_jabatan = 'MBR';
            }

            $absen->status = 'hadir';
            $absen->save();
        }
    }

    /**
     * Displays the meeting page
     */
    public function actionMeeting($idRapat) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('site_meeting')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $meetingForm = new MeetingForm();
        $deadline = new DeadlineForm();

        $rapat = Rapat::model()->findByPk($idRapat);
        $id_agendas = $this->getAgendaRapat($idRapat);

        $agendas = $this->getAgendas($id_agendas);

        $this->checkAgenda($agendas[0]->id);

        $realTemp = RealTemp::model()->findByPk($agendas[0]->id);

        DeadlineForm::$currentAgenda_id = $agendas[0]->id;

        if (isset($_POST['MeetingForm'], $_POST['DeadlineForm'])) {
            // populate input data to $a and $b
            $meetingForm->attributes = $_POST['MeetingForm'];
            $deadline->attributes = $_POST['DeadlineForm'];

            // validate BOTH $a and $b
            $valid = $meetingForm->validate();
            $valid = $deadline->validate() && $valid;

            if ($valid) {
                // use false parameter to disable validation
                $meetingForm->save(false);
                $deadline->save(false);
                // ...redirect to another page
            }
        }

        //display Meeting for PIC
        $this->render('meeting', array(
            'meetingForm' => $meetingForm,
            'deadlineForm' => $deadline,
            'rapat' => $rapat,
            'agendas' => $agendas,
            'agenda' => $agendas[0],
            'tempAgenda' => $realTemp
        ));
    }

    /**
     * Reloads the meeting page
     */
    public function actionChangeForm($id, $actor = null) {
        $meetingForm = new MeetingForm();

        $agenda = $this->getAgenda($id);
        $this->checkAgenda($agenda->id);

        $realTemp = RealTemp::model()->findByPk($agenda->id);

        DeadlineForm::$currentAgenda_id = $agenda->id;

        if ($actor == 'notulen') {
            $form = '__notulenForm';
        } else {
            $form = '__meetingForm';
        }

        //display Meeting for PIC
        $this->renderPartial($form, array(
            'meetingForm' => $meetingForm,
            'agenda' => $agenda,
            'tempAgenda' => $realTemp
        ));

        if ($actor == 'chairperson') {
            $this->renderStatusForm($agenda->id);
        }
        /* if ($actor == 'notulen') {
          $this->renderDeadlineForm($agenda->id);
          } */
    }

    /**
     * Reloads the StatusForm in meeting page for chairperson
     */
    private function renderStatusForm($id) {
        $agenda = $this->getAgenda($id);

        //display StatusForm in meeting page for chairperson
        $this->renderPartial('__statusForm', array(
            'currentAgenda' => $agenda,
        ));
    }

    /**
     * Reloads the DeadlineForm in meeting page for notulen
     */
    private function renderDeadlineForm($id) {
        $deadlineForm = new DeadlineForm();
        $agenda = $this->getAgenda($id);

        //display DeadlineForm in meeting page for notulen
        $this->renderPartial('__deadlineForm', array(
            'deadlineForm' => $deadlineForm,
            'currentAgenda' => $agenda
        ));
    }

    /**
     * save status agenda and its note and decision to agenda table
     */
    public function actionSaveAgenda($id, $idRapat = null) {
        if (isset($_POST['StatusForm'])) {
            //$model->attributes = $_POST['CreateMeetingForm'];
            $temp = $_POST['StatusForm'];

            $agenda = Agenda::model()->findByPk($id);
            $agenda->status = $temp['status'];
            $agenda->save();
        }
    }

    /**
     * checks the status of member attending the meeting
     */
    public function checkStatusMember($id, $idRapat) {
        if ($this->isNotulen($id, $idRapat)) {
            return 'notulen';
        } else if ($this->isChairperson($id, $idRapat)) {
            return 'chairperson';
        } else {
            return 'member';
        }
    }

    /**
     * checks the whether the member is notulen for the current meeting
     */
    private function isNotulen($id, $idRapat) {
        $notulen = Rapat::model()->findByAttributes(array(
            'id' => $idRapat,
            'notulen' => $id
        ));

        return $notulen;
    }

    /**
     * checks the whether the member is chairperson for the current meeting
     */
    private function isChairperson($id, $idRapat) {
        $chairperson = Rapat::model()->findByAttributes(array(
            'id' => $idRapat,
            'chairperson' => $id
        ));

        return $chairperson;
    }

    /**
     * gets member's id of an account
     */
    public function getMemberId($id) {
        $member = Account::model()->findByAttributes(array(
            'id' => Yii::app()->user->id
        ));

        return $member->id_member;
    }

    // REALTIME

    /**
     * Supply row(s) for agenda(s)
     */
    public function checkAgenda($idAgenda) {
        $realTemp = RealTemp::model()->findByPk($idAgenda);

        if (!$realTemp) {
            $realTemp = new RealTemp;
            $realTemp->id_agenda = $idAgenda;
            $realTemp->save();
        }
    }

    public function actionData($idAgenda) {
        $news = RealTemp::model()->findAllByPk($idAgenda);
        echo CJSON::encode($news);
    }

    /**
     * Update real_temp.
     */
    public function actionUpdateRealTemp($id, $column, $updated) {
        $realTemp = RealTemp::model()->findByPk($id);

        if ($column == 'catatan') {
            $realTemp->catatan = $updated;
        } else if ($column == 'keputusan') {
            $realTemp->keputusan = $updated;
        }
        $realTemp->save();
    }

    // DATA SELECTION

    /**
     * Gets list providing agenda status.
     */
    protected function getAgendaStatus() {
        $statusArray = CHtml::listData(StatusAgenda::model()->findAllByAttributes(array(), "inisial <> 'NEW'"), 'inisial', 'inisial');
        return $statusArray;
    }

    /**
     * Gets Previous Minutes.
     */
    private function getPreviousMinutes($id_rapat) {
        $criteria = new CDbCriteria;

        $criteria->params = array(':userName' => $value1, ':email' => $value2);
        $usermodel = User::model()->find($criteria);

        $criteria = new CDbCriteria;
        $criteria->join = 'inner join agenda_rapat on agenda.id=id_agenda';
        $criteria->condition = "status='IPG' OR status='OPN' OR status='PND' AND ";
        $models = Issue::model()->with('subjects', 'voteCount')->findAll($criteria);

        $prevMinutes = AgendaRapat::model()->findAllByAttributes(array(
            'id_rapat' => $id_rapat,
        ));

        return $prevMinutes;
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
     * Gets detail of a current agenda.
     */
    private function getAgenda($idAgenda) {
        $agenda = Agenda::model()->findByPk($idAgenda);

        return $agenda;
    }

    /**
     * Gets a member based on member id.
     */
    private function getMember($id) {
        $member = Member::model()->findByPk($id);

        return $member;
    }

    // CALENDAR

    /**
     * Draws calendar.
     */
    protected function drawCalendar($month, $year) {

        /* draw table */
        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

        /* table headings */
        $headings = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings) . '</td></tr>';

        /* days and weeks vars now ... */
        $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
        $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
        $days_in_this_week = 1;
        $day_counter = 0;

        /* row for week one */
        $calendar.= '<tr class="calendar-row">';

        /* print "blank" days until the first of the current week */
        for ($x = 0; $x < $running_day; $x++):
            $calendar.= '<td class="calendar-day-np"> </td>';
            $days_in_this_week++;
        endfor;

        /* keep going with days.... */
        for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
            //echo $list_day . '-' . $month . '-' . $year;
            if ($this->isMeetingDay($list_day, $month, $year)) {
                $meeting = $this->loadMeeting($this->getMeetingId($list_day, $month, $year));
                $calendar .= '<td class="calendar-meeting-day">';
                $calendar .= '<div class="hvrlink">';
                $calendar .= '<a href="index.php?r=rapat/view&id=' . $this->getMeetingId($list_day, $month, $year) . '">';
                $calendar .= '<img class="pin" src="' . Yii::app()->theme->baseUrl . '/img/icons/pushpin_small.png" />';
                $calendar .= '</a>';
            } else {
                $calendar.= '<td class="calendar-day">';
            }

            /* add in the day number */
            $calendar.= '<div class="day-number">' . $list_day . '</div>';

            /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! * */
            $calendar.= str_repeat('<p> </p>', 2);

            if ($this->isMeetingDay($list_day, $month, $year)) {
                $calendar.= '</div>';
                $calendar .= '<div class="details-pane">';
                $calendar .= '<span class="desc">' . $meeting . '</span>';
                $calendar .= '</div>';
            }
            $calendar.= '</td>';

            if ($running_day == 6):
                $calendar.= '</tr>';
                if (($day_counter + 1) != $days_in_month):
                    $calendar.= '<tr class="calendar-row">';
                endif;
                $running_day = -1;
                $days_in_this_week = 0;
            endif;
            $days_in_this_week++;
            $running_day++;
            $day_counter++;
        endfor;

        /* finish the rest of the days in the week */
        if ($days_in_this_week < 8 && $days_in_this_week > 1):
            for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
                $calendar.= '<td class="calendar-day-np"> </td>';
            endfor;
        endif;

        /* final row */
        $calendar.= '</tr>';

        /* end the table */
        $calendar.= '</table>';

        /* all done, return result */
        return $calendar;
    }

    /**
     * Checks whether it is meeting day or not.
     */
    protected function isMeetingDay($day, $month, $year) {
        $temp = $year . '-' . $month . '-' . $day;

        /* $rapat = Rapat::model()->findByAttributes(array(
          'waktu_tanggal' => $temp,
          )); */

        /* $criteria = new CDbCriteria();
          $criteria->addBetweenCondition('waktu_tanggal', ':loadFrom', ':loadTo');
          $criteria->params = array(':loadFrom' => $temp, ':loadTo' => $temp . ' 23:59:59');

          $rapat = Rapat::model()->find(array(), $criteria); */

        /* $rapat = Rapat::model()->find(
          $condition = 'waktu_tanggal LIKE :param', $params = array(
          ':param' => $temp . '%',
          )
          ); */

        /* $condition = 'waktu_tanggal LIKE :param';
          $params = array(
          ':param' => $temp . '%',
          );
          $rapat = Rapat::model()->findAll($condition, $params); */

        /* $rapat = Rapat::model()->findAll(array(
          'condition' => 'waktu_tanggal = :param',
          'params' => array(
          ':param' => $temp
          ),
          )); */
        $rapats = Rapat::model()->findAll();
        foreach ($rapats as $rapat) {
            $tamp = str_split($rapat->waktu_tanggal, 10);
            $tamp = str_split($tamp[0], 8);

            if ($tamp[1] == $day) {
                return true;
            }
        }

        return false;
    }

    /**
     * Load details of current meeting.
     */
    private function getMeetingId($day, $month, $year) {
        // get spesific date of the day
        $temp = $year . '-' . $month . '-' . $day;

        // select row containing the meeting data
        /* $criteria = new CDbCriteria();
          $criteria->addBetweenCondition('waktu_tanggal', ':loadFrom', ':loadTo');
          $criteria->params = array(':loadFrom' => $temp, ':loadTo' => $temp . ' 23:59:59');

          $meeting = Rapat::model()->find(array(), $criteria); */

        $rapats = Rapat::model()->findAll();
        foreach ($rapats as $rapat) {
            $tamp = str_split($rapat->waktu_tanggal, 10);
            $tamp = str_split($tamp[0], 8);

            if ($tamp[1] == $day) {
                return $rapat->id;
            }
        }
    }

    /**
     * Load details of current meeting.
     */
    private function loadMeeting($idRapat) {
        // select row containing the meeting data
        $meeting = Rapat::model()->findByPk($idRapat);

        // append the data into variable content
        //$content = 'Waktu : ' . $day . ' ' . $month . ' ' . $year . '</br>';
        $content = 'Waktu : ' . $meeting->waktu_tanggal . '</br>';
        $content .= 'Tempat : ' . $meeting->tempat . '</br>';
        $content .= 'Jenis Rapat : ' . $meeting->jenisRapat->deskripsi . '</br>';

        // select rows containing the agendas' data discussed in the meeting
        $agendas = $this->getAgendaRapat($meeting->id);

        // append the data into variable content
        $content .= 'Agenda :</br>';

        $i=1;
        foreach ($agendas as $agenda) {
            $content .= $i.' ';
            $content .= $agenda->idAgenda->topik.' ';
            $content .= '['.$agenda->idAgenda->pIC->inisial.']<br/>';
            $i++;
        }

        return $content;
    }

    // RBAC

    /**
     * Role-based Access Control
     */
    /* public function actionBuildAuthItems() {
      try {
      $auth = Yii::app()->authManager;

      // ROLE
      // general
      $guest = $auth->createRole('guest', 'guest, could be unregistered or a non-logged in member');
      $member = $auth->createRole('member', 'authenticated user');
      $admin = $auth->createRole('admin', 'authenticated user with more access');

      // GUEST
      // operations for guest
      $auth->createOperation('login', 'login to the web app');

      // guest's assignment
      $guest->addChild('login');

      // MEMBER
      // operations for member
      $auth->createOperation('rapat_create', "update rapat data");
      $auth->createOperation('rapat_index', "show all rapat");
      $auth->createOperation('rapat_view', "view details of a current rapat");
      $auth->createOperation('mail_deadlineReminder', "send deadline reminder mails");
      $auth->createOperation('pdf_report', "generate pdf for meeting report");
      $auth->createOperation('site_logout', "logout");
      $auth->createOperation('site_meeting', "go into meeting");
      $auth->createOperation('site_endMeeting', "end up meeting");
      $auth->createOperation('site_search', "search agenda based on topic or description");
      $auth->createOperation('request_create', "request a topic to be discussed in meeting");
      $auth->createOperation('request_index', "show all request");
      $auth->createOperation('request_view', "view details of a current request");

      // member's assignment
      $member->addChild('rapat_create');
      $member->addChild('rapat_index');
      $member->addChild('rapat_view');
      $member->addChild('mail_deadlineReminder');
      $member->addChild('pdf_report');
      $member->addChild('site_logout');
      $member->addChild('site_meeting');
      $member->addChild('site_endMeeting');
      $member->addChild('site_search');
      $member->addChild('request_create');
      $member->addChild('request_index');
      $member->addChild('request_view');
      $member->addChild('guest');

      // ADMIN
      // operations for admin
      // create task - adminAccount
      $adminAccount = $auth->createTask('adminAccount', 'manage account');
      $auth->createOperation('account_admin', "admin all accounts");
      $auth->createOperation('account_create', "create an account");
      $auth->createOperation('account_delete', "delete an account");
      $auth->createOperation('account_index', "view all accounts");
      $auth->createOperation('account_update', "update data of an account");
      $auth->createOperation('account_view', "view details of an account");

      // adminAccount's assignment
      $adminAccount->addChild('account_admin');
      $adminAccount->addChild('account_create');
      $adminAccount->addChild('account_delete');
      $adminAccount->addChild('account_index');
      $adminAccount->addChild('account_update');
      $adminAccount->addChild('account_view');

      // create task - adminAgenda
      $adminAgenda = $auth->createTask('adminAgenda', 'manage agenda');
      $auth->createOperation('agenda_admin', "admin all agendas");
      $auth->createOperation('agenda_create', "create an agenda");
      $auth->createOperation('agenda_delete', "delete an agenda");
      $auth->createOperation('agenda_index', "view all agendas");
      $auth->createOperation('agenda_update', "update data of an agenda");
      $auth->createOperation('agenda_view', "view details of an agenda");

      // adminAgenda's assignment
      $adminAgenda->addChild('agenda_admin');
      $adminAgenda->addChild('agenda_create');
      $adminAgenda->addChild('agenda_delete');
      $adminAgenda->addChild('agenda_index');
      $adminAgenda->addChild('agenda_update');
      $adminAgenda->addChild('agenda_view');

      // create task - adminKategoriRapat
      $adminKategoriRapat = $auth->createTask('adminKategoriRapat', 'manage kategori rapat');
      $auth->createOperation('kategoriRapat_admin', "admin all kategori rapats");
      $auth->createOperation('kategoriRapat_create', "create a kategori rapat");
      $auth->createOperation('kategoriRapat_delete', "delete a kategori rapat");
      $auth->createOperation('kategoriRapat_index', "view all kategori rapats");
      $auth->createOperation('kategoriRapat_update', "update data of a kategori rapat");
      $auth->createOperation('kategoriRapat_view', "view details of a kategori rapat");

      // adminKategoriRapat's assignment
      $adminKategoriRapat->addChild('kategoriRapat_admin');
      $adminKategoriRapat->addChild('kategoriRapat_create');
      $adminKategoriRapat->addChild('kategoriRapat_delete');
      $adminKategoriRapat->addChild('kategoriRapat_index');
      $adminKategoriRapat->addChild('kategoriRapat_update');
      $adminKategoriRapat->addChild('kategoriRapat_view');

      // create task - adminMember
      $adminMember = $auth->createTask('adminMember', 'manage member');
      $auth->createOperation('member_admin', "admin all members");
      $auth->createOperation('member_create', "create a member");
      $auth->createOperation('member_delete', "delete a member");
      $auth->createOperation('member_index', "view all members");
      $auth->createOperation('member_update', "update data of a member");
      $auth->createOperation('member_view', "view details of a member");

      // adminKategoriRapat's assignment
      $adminMember->addChild('member_admin');
      $adminMember->addChild('member_create');
      $adminMember->addChild('member_delete');
      $adminMember->addChild('member_index');
      $adminMember->addChild('member_update');
      $adminMember->addChild('member_view');

      // create task - adminRapat
      $adminRapat= $auth->createTask('adminRapat', 'manage rapat');
      $auth->createOperation('rapat_admin', "admin all rapats");
      $auth->createOperation('rapat_delete', "delete a rapat");
      $auth->createOperation('rapat_update', "update data of a rapat");

      // adminRapat's assignment
      $adminRapat->addChild('rapat_admin');
      $adminRapat->addChild('rapat_delete');
      $adminRapat->addChild('rapat_update');

      // create task - adminRequest
      $adminRequest = $auth->createTask('adminRequest', 'manage request');
      $auth->createOperation('request_admin', "admin all members");
      $auth->createOperation('request_choosePIC', "choose PIC for a current request");
      $auth->createOperation('request_delete', "delete a request");
      $auth->createOperation('request_manage', "manage requests");
      $auth->createOperation('request_responseRequest', "approve/reject request");
      $auth->createOperation('request_update', "update a request");

      // adminRequest's assignment
      $adminRequest->addChild('request_admin');
      $adminRequest->addChild('request_choosePIC');
      $adminRequest->addChild('request_delete');
      $adminRequest->addChild('request_manage');
      $adminRequest->addChild('request_responseRequest');
      $adminRequest->addChild('request_update');

      // create task - adminGrupRapat
      $adminGrupRapat = $auth->createTask('adminGrupRapat', 'manage grup rapat');
      $auth->createOperation('grupRapat_admin', "admin all grup rapats");
      $auth->createOperation('grupRapat_create', "create a grup rapat");
      $auth->createOperation('grupRapat_delete', "delete a grup rapat");
      $auth->createOperation('grupRapat_index', "view all grup rapats");
      $auth->createOperation('grupRapat_update', "update data of a grup rapat");
      $auth->createOperation('grupRapat_view', "view details of a grup rapat");

      // adminGrupRapat's assignment
      $adminGrupRapat->addChild('grupRapat_admin');
      $adminGrupRapat->addChild('grupRapat_create');
      $adminGrupRapat->addChild('grupRapat_delete');
      $adminGrupRapat->addChild('grupRapat_index');
      $adminGrupRapat->addChild('grupRapat_update');
      $adminGrupRapat->addChild('grupRapat_view');

      // other operations for admin
      $auth->createOperation('site_register', "register a new member");
      $auth->createOperation('mail_meetingReminder', "send meeting reminder emails");

      // admin's assignment
      $admin->addChild('adminAccount');
      $admin->addChild('adminAgenda');
      $admin->addChild('adminKategoriRapat');
      $admin->addChild('adminMember');
      $admin->addChild('adminRapat');
      $admin->addChild('adminRequest');
      $admin->addChild('adminGrupRapat');
      $admin->addChild('site_register');
      $admin->addChild('mail_meetingReminder');
      $admin->addChild('member');

      // ROLE ASSIGNMENT
      // 1 is the account id to whom the 'admin' role is given
      $auth->assign('admin', 3);
      $auth->assign('admin', 7);

      // 2,3,4 and 5 are the account ids to whom the 'member' role is given
      $auth->assign('member', 5);
      $auth->assign('member', 6);
      $auth->assign('member', 8);

      echo('Built successfully. This is a one-time execution. Please remove or comment this action.');
      } catch (CDbException $cdbe) {
      throw new CException('You already have  the auth items declared. Please remove or comment this action.');
      }
      } */

    /* public function actionWhatever() {
      $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
      $mailer->IsSMTP();
      $mailer->IsHTML(true);
      $mailer->SMTPAuth = true;
      $mailer->SMTPSecure = "ssl";
      $mailer->Host = "smtp.gmail.com";
      $mailer->Port = 465;
      $mailer->Username = "syp.ti1.01@gmail.com";
      $mailer->Password = 'justatest';
      $mailer->From = "Jonathan Natanael";
      $mailer->FromName = "Percobaan Kirim Email";
      //$mailer->AddAddress("agnesiregar2307@gmail.com");
      $mailer->AddAddress("sitta.juntak@gmail.com", 'Sitta Simanjuntak');
      $mailer->Subject = "I LOVEEEE AGNES JULIANA SIREGAR!!!!!!!!!!!!!!!!!!!.";
      $mailer->Body = "INI ADALAH PERCOBAAN FUNGSI EMAIL PA2 OLEH JONATHAN SIAHAAN.";
      if ($mailer->Send()) {
      echo "Message sent successfully!";
      } else {
      echo "Fail to send your message!";
      }
      } */

    public function actionSendMeetingReminder($id) {
        $temp = Yii::app()->createController('mail');
        $mailController = $temp[0];

        if ($mailController->sendMeetingReminder($id)) {
            redirect('index');
        }
    }

    public function actionSendMeetingReport($id) {
        $temp = Yii::app()->createController('mail');
        $mailController = $temp[0];

        if ($mailController->sendMeetingReport($id)) {
            redirect('index');
        }
    }

    public function actionReport() {
        $pdf = Yii::app()->domPdf;
        //$pdf->domPdf->set_paper('a5');
        $pdf->generate('<h1>Dida Nurwanda</h1>', 'dida.pdf', false);
    }

    public function meetingToday() {
        $today = getdate();

        if ($this->isMeetingDay($today['mday'], $today['mon'], $today['year'])) {
            $meetingId = $this->getMeetingId($today['mday'], $today['mon'], $today['year']);

            return $meetingId;
        } else {
            return null;
        }
    }

    public function actionEndMeeting($idRapat) {
        $rapat = Rapat::model()->findByPk($idRapat);
        $agendaRapats = $this->getAgendaRapat($idRapat);

        $agendaRapats = $this->getAgendas($agendaRapats);
        foreach ($agendaRapats as $agendaRapat) {
            $tempAgenda = TempAgenda::model()->findByAttributes(array(
                'id_agenda' => $agendaRapat->id
            ));

            if (!$tempAgenda) {
                $realTemp = RealTemp::model()->findByPk($agendaRapat->id);

                $tempAgenda = new TempAgenda;
                $tempAgenda->id_agenda = $agendaRapat->id;
                $tempAgenda->tanggal = $rapat->waktu_tanggal;
                $tempAgenda->topik = $agendaRapat->topik;
                $tempAgenda->catatan = $realTemp->catatan;
                $tempAgenda->keputusan = $realTemp->keputusan;
                $tempAgenda->deadline = $realTemp->deadline;

                $tempAgenda->save();
            }
        }

        $this->redirect(array('site/meetingEnded', 'idRapat' => $rapat->id));
    }

    public function actionMeetingEnded($idRapat) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('site_endMeeting')) {
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

        $this->render('meetingEnded', array(
            'rapat' => $rapat,
            'agendas' => $agendaRapats,
            'daftarAbsen' => $daftarAbsen
        ));
    }

    /**
     * Displays a search view.
     */
    public function actionSearch() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('site_search')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $dataProvider = new CActiveDataProvider('Agenda');

        $model = new Agenda('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Agenda'])) {
            $model->attributes = $_GET['Agenda'];
        }

        $this->render('searchAgenda', array(
            'model' => $model,
            'dataProvider' => $dataProvider
        ));
    }

    /**
     * save status agenda and its note and decision to agenda table
     */
    public function actionSaveDeadline($id, $idRapat = null) {
        if (isset($_POST['DeadlineForm'])) {
            //$model->attributes = $_POST['CreateMeetingForm'];
            $temp = $_POST['DeadlineForm'];

            //$id = $this->getCurrentAgendaId();
            $realTemp = RealTemp::model()->findByPk($id);

            $tamp = 'Penanggungjawab : ' . $temp['penanggungjawab'] . '#';
            $tamp .= 'Deadline : ' . $temp['deadline'] . '#';
            $tamp .= 'Tanggal Deadline : ' . $temp['tgl_deadline'] . '#';
            //$tamp .= $id . '#';

            $realTemp->deadline .= $tamp;
            $realTemp->save();
        }
        echo 'ok';
    }

}
?>

