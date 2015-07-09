<?php

class RequestController extends Controller {

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
    public function actionView($id, $action = null) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('request_view')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('request_create')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $model = new Request;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Request'])) {
            $model->attributes = $_POST['Request'];
            $model->id_account = Yii::app()->user->id;
            if ($model->save())
                $this->redirect(array('index'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('request_update')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Request'])) {
            $model->attributes = $_POST['Request'];
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
        if (!Yii::app()->user->checkAccess('request_delete')) {
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
        if (!Yii::app()->user->checkAccess('request_index')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $dataProvider = new CActiveDataProvider('Request');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionManage() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('request_manage')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $criteria = new CDbCriteria(
                array(
            'condition' => "status = 'pending'",
        ));

        $dataProvider = new CActiveDataProvider('Request', array(
            'criteria' => $criteria,
        ));

        $this->render('manage', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('request_admin')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $model = new Request('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Request']))
            $model->attributes = $_GET['Request'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Request the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Request::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Request $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'request-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*     * * syp_ti1_01 ** */

    /**
     * Response request.
     */
    public function actionResponseRequest($id, $action) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('request_responseRequest')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $model = $this->loadModel($id);

        if ($action === 'approve') {
            $model->status = 'approved';
            $model->save();

            $this->redirect(array('choosePIC&id=' . $id . '&action=' . $action));
        } else {
            $model->status = 'rejected';
            $model->save();
            
            $temp = Yii::app()->createController('mail');
            $mailController = $temp[0];
            
            $mailController->sendRequestNotification($model->id);
        }

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
    }

    public function actionChoosePIC($id, $action) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('request_choosePIC')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $model = $this->loadModel($id);
        if (isset($_POST['PICForm'])) {
            $submitted = $_POST['PICForm'];

            $agenda = new Agenda;
            $agenda->topik = $model->topik;
            $agenda->deskripsi = $model->deskripsi;
            $agenda->jenis_rapat = $model->jenis_rapat;
            $agenda->PIC = $submitted['PIC'];

            if ($agenda->save())
                $this->redirect(array('index'));
        }

        $picForm = new PICForm;

        $this->render('view', array(
            'model' => $model,
            'action' => $action,
            'picForm' => $picForm
        ));
    }
    
    /**
     * Gets array providing the meeting categories.
     */
    protected function getMeetingCategories() {
        $categoryArray = CHtml::listData(KategoriRapat::model()->findAll(), 'inisial', 'deskripsi');
        return $categoryArray;
    }

}
