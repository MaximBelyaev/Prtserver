<?php

class CustomersController extends MainController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/main';

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
			array('allow',
					'actions'=>array('create','update', 'index'),
					'users'=>array('@'),
			),
			array('deny',
				'actions'=>array('create','update', 'index'),
				'users'=>array('?'),
			),
		);
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Customers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customers']))
		{
			$model->attributes=$_POST['Customers'];
			if($model->save()){
				$this->redirect(array('index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customers']))
		{
			$model->attributes=$_POST['Customers'];
			if($model->save()){
				$this->redirect(array('index'));
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
		$allCustomers = Customers::model()->findAll();
		$activatedCustomers = new CActiveDataProvider('Customers', array('criteria'=>array(
			'condition'=>'status = 1')));
		$dataProvider=new CActiveDataProvider('Customers');
		$this->render('index',array(
			'allCustomers'=>$allCustomers,
			'activatedCustomers'=>$activatedCustomers,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Customers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customers']))
			$model->attributes=$_GET['Customers'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAddcodes()
	{
		for ($i = 1; $i <= 200; $i++)
		{
			$model=new Customers();
			$model->status = 'not_activated';
			$model->save();
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Customers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='customers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
