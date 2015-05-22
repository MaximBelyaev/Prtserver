<?php

class ApiController extends MainController
{

	public function actionUpdate($license)
	{
		$customer = Customers::findByLicense($license);
		if (!is_null($customer)) {
			$version = Versions::model()->find("status={$customer->status} ORDER BY date DESC");
			if (!is_null($version)) {
				$vdir = trim(Yii::app()->params['versionsDir'],"/");
				$archiveName = 'prt+' . $customer->c_id
							. '_s+' . $version->getStatusNameByLang('en')
							. '_v+' . $version->name 
							. '.zip';
				$zip = new Zip();

				$zip->open( 'assets/' . $archiveName, Zip::CREATE );
				$zip->addDirectory( $vdir . $version->dir, $vdir . $version->dir );
				$zip->close();
				$this->sendFile( 'assets/' . $archiveName );
			}
		} else {
			
		}
//		echo json_encode(array('hello'));
	}

	protected function sendFile($file)
	{
		if (file_exists($file)) {
			// сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
			// если этого не сделать файл будет читаться в память полностью!
			if (ob_get_level()) {
				ob_end_clean();
			}
			// заставляем браузер показать окно сохранения файла
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . basename($file));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			// читаем файл и отправляем его пользователю
			readfile($file);
			exit;
		}
	}

}