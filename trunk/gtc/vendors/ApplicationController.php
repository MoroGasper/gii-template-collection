<?php

abstract class ApplicationController extends Controller {
	protected $_model;

	public function unpickleForm(&$model) {
		if(isset($_SESSION['<?php echo $this->modelClass; ?>'])) 
			$model->attributes = $_SESSION['<?php echo $this->modelClass; ?>'];
	}

	public function pickleForm(&$model, $formdata) {
		foreach($formdata as $key => $value) 
			if(is_array($value))
				$_SESSION[$key] = $value;
	}


	public function loadModel($model = false)
	{
		if(!$model)
			$model = str_replace('Controller', '', get_class($this));

		if($this->_model === null)
		{
			if(isset($_GET['id']))
				$this->_model = CActiveRecord::model($model)->findbyPk($_GET['id']);

			if($this->_model===null)
				throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model, $form)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] == $form)
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>