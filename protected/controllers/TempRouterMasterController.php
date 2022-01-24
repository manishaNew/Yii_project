<?php

class TempRouterMasterController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	public function actionQuickCreate() {
		$model=new TempRouterMaster;
		print_r($_POST);
		 if(isset($_POST['TempRouterMaster']))
		  {
		   $model->attributes=$_POST['TempRouterMaster'];
		   if($model->save()){
			   
		   }
		   $this->redirect(array('RouterMaster/admin')); //<-- assuming the Grid was used unter view admin/
		  }
		}

		public function actionUpdate($id){
			unset($_POST['temp_router_master']['fail_validation_reason']);
			$routerMaster = new RouterMaster;
			$temp_model = TempRouterMaster::model()->findByPk($id);

			$temp_model->sapid = $_POST['temp_router_master']['sapid']??'';
			$temp_model->hostname  = $_POST['temp_router_master']['hostname']??'';
			$temp_model->loopback  = $_POST['temp_router_master']['loopback']??'';
			$temp_model->mac_id  = $_POST['temp_router_master']['mac_id']??'';

			$routerMaster->sapid = $_POST['temp_router_master']['sapid']??'';
			$routerMaster->hostname  = $_POST['temp_router_master']['hostname']??'';
			$routerMaster->loopback  = $_POST['temp_router_master']['loopback']??'';
			$routerMaster->mac_id  = $_POST['temp_router_master']['mac_id']??'';

			$validation_flag = 0;
			$fail_validation_reason = '';
			if($routerMaster->validate()){
				$validation_flag=1;
			}else{
				
				$fail_validation_reason=json_encode($routerMaster->getErrors());
			}
			
			$temp_model->success_status = $validation_flag;
			$temp_model->fail_validation_reason = $fail_validation_reason;
			$temp_model->save();

			echo json_encode(['success_status'=>$validation_flag,'fail_validation_reason'=>$fail_validation_reason]);
			exit;

		}

		public function actionDelete($id)
		{
			$this->loadModel($id)->delete();
	
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

		public function loadModel($id)
		{
			$model=TempRouterMaster::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}

		public function actionReadExcel(){

			$model = new UploadFile;
			$routerMaster = new RouterMaster;
			if(isset($_FILES['UploadFile']))
			{
				$model->attributes=$_FILES['UploadFile'];
				//If invalid file then return error msg
				if(!$model->validate()){
					$file_errors = $model->getErrors()['csv_file']??[];
					$file_error_msg = implode(' , ',$file_errors);
					Yii::app()->user->setFlash('error', $file_error_msg);
					$this->redirect(array('RouterMaster/excelView')); 
				}
			
				if(!empty($_FILES['UploadFile']['tmp_name']['csv_file']))
				{
					$file = CUploadedFile::getInstance($model,'csv_file');
					$fp = fopen($file->tempName, 'r');
					if($fp)
					{
						$cnt=0;
						while(($line = fgetcsv($fp, 1000, ";")) != FALSE){
							if($cnt>0){
								$row_data = explode(',',$line[0])??[];
								$temp_model = new TempRouterMaster;
								$temp_model->sapid = $row_data[0]??'';
								$temp_model->hostname  = $row_data[1]??'';
								$temp_model->loopback  = $row_data[2]??'';
								$temp_model->mac_id  = $row_data[3]??'';
								$validation_flag = 0;
								$fail_validation_reason = '';
								$routerMaster->sapid = $row_data[0]??'';
								$routerMaster->hostname  = $row_data[1]??'';
								$routerMaster->loopback  = $row_data[2]??'';
								$routerMaster->mac_id  = $row_data[3]??'';
								$fail_validation_reason_array=[];
								if($routerMaster->validate() ){
									$validation_flag=1;
								}else{
									$fail_validation_reason_array=$routerMaster->getErrors();
								}
								
								if(!$temp_model->validate()){
									$validation_flag=2;
								}
								$fail_validation_reason=json_encode(array_merge($fail_validation_reason_array,$temp_model->getErrors()));
								$temp_model->success_status = $validation_flag;
								$temp_model->fail_validation_reason = $fail_validation_reason;
								$temp_model->save(false);
						
								
							}else{
								$uploaded_header = $line[0];
								if($uploaded_header!='sap_id,hostname,loopback,mac_id'){
									Yii::app()->user->setFlash('error', 'Column names are incorrect.');
									$this->redirect(array('RouterMaster/excelView')); 
								}
							}	
							$cnt++;
		
						}
						$this->redirect(Yii::app()->createAbsoluteUrl('routerMaster/admin'));
					}	
				}
			}
		}
	
}