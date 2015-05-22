<?php 

class MainController extends CController
{
	public function getStatusesByLang($lang)
	{
		$statuses = Yii::app()->params['statuses'];
		return array_map(function($e) use ($lang) {
			if (is_array($e)) {	
				if (!empty($e)) {
					if (isset($e[$lang])) {
						return $e[$lang];
					} elseif (isset($e['en'])) {
						return $e['en'];
					} else {
						return reset($e);
					}
				} else {
					return '-----';
				}
			} 
			return $e;
		},$statuses);
	}

}

?>