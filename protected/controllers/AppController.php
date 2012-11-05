<?php

class AppController extends JsonApiController{
	
	public function actionTest(){
		
		$this->sendResponse(200,CJSON::encode(array('success'=>true)));
	}
}