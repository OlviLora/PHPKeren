<?php

class KategoriRapatController extends Controller {

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
                /*'actions' => array('index', 'view'),
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
            array('deny', // deny all users*/
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
        if (!Yii::app()->user->checkAccess('kategoriRapat_view')) {
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
        if (!Yii::app()->user->checkAccess('kategoriRapat_create')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }
        
        $model = new KategoriRapat;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['KategoriRapat'])) {
            $model->attributes = $_POST['KategoriRapat'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->inisial));
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
        if (!Yii::app()->user->checkAccess('kategoriRapat_update')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }
        
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['KategoriRapat'])) {
            $model->attributes = $_POST['KategoriRapat'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->inisial));
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
        if (!Yii::app()->user->checkAccess('kategoriRapat_delete')) {
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
        if (!Yii::app()->user->checkAccess('kategoriRapat_index')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }
        
        $dataProvider = new CActiveDataProvider('KategoriRapat');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('kategoriRapat_admin')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }
        
        $model = new KategoriRapat('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['KategoriRapat']))
            $model->attributes = $_GET['KategoriRapat'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return KategoriRapat the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = KategoriRapat::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param KategoriRapat $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'kategori-rapat-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
