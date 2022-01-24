<?php

class RouterMasterController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $defaultAction = 'excelView';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','excelView','ReadExcel'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RouterMaster;
		$router = New TempRouterMaster;
		$routerdata = $router->findAll();
		
		$transaction=Yii::app()->db->beginTransaction();
		try
		{

			//echo "<pre>";print_r($routerdata);exit;
			
			foreach ($routerdata as $router) {
				//echo "<pre>";print_r($router);
				$modelr=new RouterMaster;
				$modelr->sapid = $router->sapid;
				$modelr->hostname  = $router->hostname;
				$modelr->loopback  = $router->loopback;
				$modelr->mac_id  = $router->mac_id;
				
				if(!$modelr->validate())
				{
				    $transaction->rollback();
					//print_r($modelr->getErrors());exit;
					Yii::app()->user->setFlash('error', "Please provide valid details.Please make sure no data in RED and Grey color. ");
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
				}else{
					$modelr->save();
				}
			}
			$transaction->commit();
			TempRouterMaster::model()->deleteAll();
			Yii::app()->user->setFlash('success', " Data Uploaded successfully.");
			$this->redirect(Yii::app()->createAbsoluteUrl('routerMaster/index'));
		}
		catch(Exception $e)
		{
		$transaction->rollback();
		}
}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['RouterMaster']))
		{
		
			$model->attributes=$_POST['RouterMaster'];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RouterMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TempRouterMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TempRouterMaster']))
			$model->attributes=$_GET['TempRouterMaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RouterMaster the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RouterMaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RouterMaster $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		//print_r($_POST);exit;
		if(isset($_POST['ajax']) && $_POST['ajax']==='router-master-form')
		{
			
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionExcelView(){
		$model = new UploadFile();
		$this->render('excel_view',['model'=>$model]);
	}

	
	
}
