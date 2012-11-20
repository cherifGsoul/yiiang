<?php
    class JsonApiController extends CController
    {
    	/**
		 * 
		 */
		public $modelName;
		
		public function init(){
			parent::init();
			if(empty($this->modelName))
				throw new CException(Yii::t('api',"Error Processing Request"));				
		}

		/**
		 * @return array action filters
		 */
		public function filters()
		{
			return array(
				//'accessControl', // perform access control for CRUD operations
				
				/*array(
				        'CHttpCacheFilter + show',
				 	    'cacheControl'=>'',
				 	    'etagSeed'=>'02aAMdodsd'
			 	    )*/
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
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
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
		
		public function actionShow($id)
		{
			$model=$this->loadModel($id);
			
			$this->sendResponse(200,CJSON::encode($model));
		}
		
		/**
		* Lists all models.
	 	*/
		public function actionIndex()
		{
			$dataProvider=CActiveRecord::Model($this->modelName)->search();
			//var_dump($dataProvider->pagination);exit;
			$this->sendResponse(200,CJSON::encode(array(
													'offset'=>$dataProvider->pagination->offset,
													'pageVar'=>$dataProvider->pagination->pageVar,
													'pageCount'=>$dataProvider->pagination->pageCount,
													'itemCount'=>$dataProvider->pagination->itemCount,
													'currentPage'=>$dataProvider->pagination->currentPage,
													'pageSize'=>$dataProvider->pagination->pageSize,
													'data'=>$dataProvider->data,
													'params'=>$dataProvider->pagination->params,
								)));
		}
		
		public function actionCreate(){
			$data=$this->getInputAsJson();
			
			if(empty($data))
				$this->sendResponse(400);
		
			$model=new $this->modelName;
			$model->setAttributes($data);
			if($model->save())
				$this->sendResponse(200);
			else
				$this->sendResponse(400,CJSON::encode($model->getErrors()));
		}
		
		/**
		 * Updates a particular model.
		 * If update is successful, the browser will be redirected to the 'view' page.
		 * @param integer $id the ID of the model to be updated
		 */
		public function actionUpdate($id)
		{
			if(Yii::app()->request->isPutRequest){	
				$data=$this->getInputAsJson();
				//var_dump($data);
				$model=$this->loadModel($id);
				$model->setAttributes($data);
				if (!$model->save())
					$this->sendResponse(500, CJSON::encode($model->getErrors()));
			}else{
				$this->sendResponse(400);	
			}
			
			$this->sendResponse(200,CJSON::encode(array('response'=>'ok')));
		}
		
		/**
		* Deletes a particular model.
		* If deletion is successful, the browser will be redirected to the 'admin' page.
		* @param integer $id the ID of the model to be deleted
		*/
		public function actionDelete($id){
			if(Yii::app()->request->isDeleteRequest){
				$model=$this->loadModel($id);
				if(!$model->delete())
					throw new CException('api','Cannot Delete Model');
				$this->sendResponse(200);
			}
		}
		
		/**
		 * Returns the data model based on the primary key given in the GET variable.
		 * If the data model is not found, an HTTP exception will be raised.
		 * @param integer the ID of the model to be loaded
		 */
		public function loadModel($id)
		{
			$model=CActiveRecord::model($this->modelName)->findByPk($id);
			if($model===null)
				$this->sendResponse(404);
			return $model;
		}
	
	    /**
		 * Send raw HTTP response
		 * @param int $status HTTP status code
		 * @param string $body The body of the HTTP response
		 * @param string $contentType Header content-type
		 * @return HTTP response 
		 */
		protected function sendResponse($status = 200, $body = '', $contentType = 'application/json')
		{
			// Set the status
			$statusHeader = 'HTTP/1.1 ' . $status . ' ' . $this->getStatusCodeMessage($status);
			header($statusHeader);
			// Set the content type
			header('Content-type: ' . $contentType);
		 
			echo $body;
			Yii::app()->end();
		}
		
		/**
		 * Return the http status message based on integer status code
		 * @param int $status HTTP status code
		 * @return string status message
		 */
		protected function getStatusCodeMessage($status)
		{
		    $codes = array(
				100 => 'Continue',
				101 => 'Switching Protocols',
				200 => 'OK',
				201 => 'Created',
				202 => 'Accepted',
				203 => 'Non-Authoritative Information',
				204 => 'No Content',
				205 => 'Reset Content',
				206 => 'Partial Content',
				300 => 'Multiple Choices',
				301 => 'Moved Permanently',
				302 => 'Found',
				303 => 'See Other',
				304 => 'Not Modified',
				305 => 'Use Proxy',
				306 => '(Unused)',
				307 => 'Temporary Redirect',
				400 => 'Bad Request',
				401 => 'Unauthorized',
				402 => 'Payment Required',
				403 => 'Forbidden',
				404 => 'Not Found',
				405 => 'Method Not Allowed',
				406 => 'Not Acceptable',
				407 => 'Proxy Authentication Required',
				408 => 'Request Timeout',
				409 => 'Conflict',
				410 => 'Gone',
				411 => 'Length Required',
				412 => 'Precondition Failed',
				413 => 'Request Entity Too Large',
				414 => 'Request-URI Too Long',
				415 => 'Unsupported Media Type',
				416 => 'Requested Range Not Satisfiable',
				417 => 'Expectation Failed',
				500 => 'Internal Server Error',
				501 => 'Not Implemented',
				502 => 'Bad Gateway',
				503 => 'Service Unavailable',
				504 => 'Gateway Timeout',
				505 => 'HTTP Version Not Supported',
	
		    );
		    return (isset($codes[$status])) ? $codes[$status] : '';
		}

		protected function getInputAsJson(){
			return CJSON::decode(file_get_contents('php://input'));
		}

		
    }
