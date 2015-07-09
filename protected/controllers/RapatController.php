<?php

class RapatController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                /* 'actions' => array('index', 'view'),
                  'users' => array('*'),
                  ),
                  array('allow', // allow authenticated user to perform 'create' and 'update' actions
                  'actions' => array('create', 'update'),
                  'users' => array('@'),
                  ),
                  array('allow', // allow admin user to perform 'admin' and 'delete' actions
                  'actions' => array('admin', 'delete'),
                  'users' => array('admin'),
                  ),
                  array('deny', // deny all users */
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('rapat_view')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        // select rows containing the agendas' data discussed in the meeting
        $agendas = $this->getAgendaRapat($id);

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'agendas' => $agendas
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($jenisRapat = null) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('rapat_create')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        if ($this->isDivisionAdmin()) {

            $model = new CreateMeetingForm;

            $agendaController = Yii::app()->createController('agenda'); // returns array containing controller instance and action index
            $agendaController = $agendaController[0];                   // get the controller instance.

            $createAgendaForm = new CreateAgendaForm;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['CreateMeetingForm'])) {
                //$model->attributes = $_POST['CreateMeetingForm'];
                $temp = $_POST['CreateMeetingForm'];

                $rapat = new Rapat;
                $rapat->waktu_tanggal = $temp['waktu_tanggal'];
                $rapat->tempat = $temp['tempat'];
                $rapat->jenis_rapat = $temp['jenis_rapat'];
                $rapat->grup_rapat = $temp['grup_rapat'];
                $rapat->chairperson = $temp['chairperson'];
                $rapat->notulen = $temp['notulen'];

                if ($rapat->save()) {
                    $model->agenda = $_POST['destination'];
                    $model->agenda = $this->appendPreviousMinutes($model->agenda);

                    $this->saveAllAgendas($rapat->id, $model->agenda);
                    $this->redirect(array('index'));
                }
            }
            $this->render('create', array(
                'model' => $model,
                'agendaForm' => $createAgendaForm,
                'jenisRapat' => $jenisRapat
            ));
        }
        else {
            $this->render('notAdmin');
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('rapat_update')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Rapat'])) {
            $model->attributes = $_POST['Rapat'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('rapat_delete')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('rapat_index')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $dataProvider = new CActiveDataProvider('Rapat');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('rapat_admin')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $model = new Rapat('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Rapat']))
            $model->attributes = $_GET['Rapat'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Rapat the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Rapat::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Rapat $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'rapat-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*     * ** SYP_TI1_01 *** */

    /**
     * Saves all agendas selected for a meeting to Agenda_Rapat.
     */
    protected function saveAllAgendas($id_rapat, $agendas) {
        foreach ($agendas as $id_agenda) {
            $agenda_rapat = new AgendaRapat;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            $agenda_rapat->id_rapat = $id_rapat;
            //echo 'id rapat : '.$id_rapat;
            $agenda_rapat->id_agenda = $id_agenda;
            //echo ' id agenda : '.$id_agenda.'<br/>';
            //$agenda = Agenda::model()->findByPk($id_agenda);
            //$agenda = AgendaController::class()->giveStatus($id_agenda, 'open');
            //$agenda->status = 'open';

            $agenda_rapat->save();
            //$agenda->save();
        }
    }

    /**
     * Loads data about a certain meeting.
     */
    public function loadMeeting($date = '2014-04-18') {
        $meeting = Rapat::model()->findByAttributes(array(
            'waktu_tanggal' => $date,
        ));
        return $meeting;
    }

    /**
     * Gets Previous Minutes.
     */
    public function getPreviousMinutes($jenisRapat = 'FM') {
        $prevMinutes = Agenda::model()->findAllByAttributes(array(
            'status' => array('OPN', 'IPG', 'PND'),
            'jenis_rapat' => $jenisRapat
        ));

        return $prevMinutes;
    }

    /**
     * Gets array providing undiscussed agendas.
     */
    protected function getUndiscussedAgenda($jenisRapat = 'FM') {
        $agendaArray = CHtml::listData(Agenda::model()->findAllByAttributes(array('status' => 'NEW', 'jenis_rapat' => $jenisRapat)), 'id', 'topik');
        return $agendaArray;
    }

    /**
     * Appends the Previous Minutes id(s) to array of selected agenda(s) for current meeting.
     */
    private function appendPreviousMinutes($agendaIds) {
        foreach ($agendaIds as $agendaId) {
            $agendas[] = $agendaId;
        }

        $prevMinutes = $this->getPreviousMinutes();
        foreach ($prevMinutes as $prevMinute) {
            $agendas[] = $prevMinute->id;
        }

        return $agendas;
    }

    /**
     * Gets array providing the meeting categories.
     */
    protected function getMeetingCategories() {
        $divisi = $this->isDivisionAdmin();

        if ($divisi) {
            $jenisRapatDivisi = DivisiKategorirapat::model()->findAllByAttributes(array(
                'nama_divisi' => $divisi
            ));

            foreach ($jenisRapatDivisi as $jenisRapat) {
                $jenisRapats[] = $jenisRapat->jenis_rapat;
            }
        }

        //print_r($jenisRapats);
        $categoryArray = CHtml::listData(KategoriRapat::model()->findAllByAttributes(array(
                            'inisial' => $jenisRapats
                        )), 'inisial', 'deskripsi');
        //$categoryArray = CHtml::listData(KategoriRapat::model()->findAll(), 'inisial', 'deskripsi');
        return $categoryArray;
    }

    /**
     * Gets array providing the groups attending the meeting.
     */
    protected function getMeetingGroups() {
        $groupArray = CHtml::listData(GrupRapat::model()->findAll(), 'inisial', 'inisial');
        return $groupArray;
    }

    /**
     * Checks whether the member is an admin or not.
     * If yes, return the name of the division.
     */
    private function isDivisionAdmin() {
        $adminDivisi = AnggotaDivisi::model()->findByAttributes(array(
            'id_account' => Yii::app()->user->id
        ));

        if ($adminDivisi) {
            if ($adminDivisi->status == 'admin') {
                return $adminDivisi->divisi;
            }
            return false;
        } else {
            return false;
        }
    }

    /**
     * Gets array providing the members.
     */
    protected function getMembers() {
        $memberArray = CHtml::listData(Member::model()->findAll(), 'id', 'nama');
        return $memberArray;
    }

    /**
     * Gets member model based on spesific id.
     */
    public function getMember($id) {
        $member = Member::model()->findByPk($id);
        return $member;
    }

    /**
     * Draws list box containing agenda(s)
     */
    protected function drawAgendaListBox($listName, $data = null, $multiple = false, $temp = null) {
        echo "<select class='$listName' rows=2";

        if ($multiple)
            echo " multiple='multiple'";

        if ($temp)
            echo " name='$temp'";

        echo ">";

        if ($data) {
            foreach ($data as $datum) {
                $model = Agenda::model()->findByAttributes(array(
                    'topik' => $datum,
                ));
                echo "<option value=$model->id>$datum</option>";
            }
        }

        echo "</select>";
    }

    public function actionUpdateAgendaForm() {
        $jenisRapat = $_POST['jenisRapat'];
        $prevMinutes = $this->getPreviousMinutes($jenisRapat);
        $undiscussedAgendas = $this->getUndiscussedAgenda($jenisRapat);

        $this->renderPartial('__agendaForm', array(
            'prevMinutes' => $prevMinutes,
            'undiscussedAgendas' => $undiscussedAgendas
        ), false, true);
        //echo 'ganti';
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

}

?>