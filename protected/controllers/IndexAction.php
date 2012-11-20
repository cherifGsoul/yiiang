<?php
/**
 * IndexAction class file.
 *
 * @author Jon Doe <jonny@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * IndexAction is ...
 *
 *
 * @author Jon Doe <jonny@gmail.com>
 * @version
 * @package
 * @since 1.0
 */


class IndexAction extends CAction
{
	public $modelName;
	
    public function run()
    {
    	$model=new $this->modelName;
    	$dataProvider=$model->list;
    	echo CJSON::encode($dataProvider->data);
    }
}