<?php

class ApiController extends MainController
{


	public function actionDbUpdate($license)
	{
		$customer = Customers::findByLicense($license);

		if (!is_null($customer)) {

			$version = Versions::model()->find("status={$customer->status} ORDER BY date DESC");

			if (!is_null($version)) {

				if ( $version->db_update ) {
					echo json_encode(array(
						'status' => 'has_update', 
						'db_update' => $version->db_update,
						'db_revert' => $version->db_revert,
					));
				} else {
					echo json_encode(array(
						'status' => 'no_update'
					));

				}

			}

		}

	}


	public function actionUpdate($license)
	{
		$customer = Customers::findByLicense($license);

		if (!is_null($customer)) {

			$version = Versions::model()->find("status={$customer->status} ORDER BY date DESC");

			if (!is_null($version)) {
				$vdir = Yii::app()->params['versionsDir'];
				$archiveName = 'prt+' . $customer->c_id
							. '_s+' . $version->getStatusNameByLang('en')
							. '_v+' . $version->name 
							. '.zip';
				$zip = new Zip();

				$zip->open( 'assets/' . $archiveName, Zip::CREATE );
				$zip->addDirectory( $vdir . $version->dir, $vdir . $version->dir );

				if($zip->close())
				{
					$vd = new VersionsDownloads();
					$vd->v_id = $version->v_id;
					$vd->c_id = $customer->c_id;
					$vd->time = time();
					$vd->ip   = ip2long($_SERVER['REMOTE_ADDR']);
					$vd->save();
				}
				$this->sendFile( 'assets/' . $archiveName );
			}
		} else {
			
		}
	}

	public function actionLastupdate($license)
	{
		$customer = Customers::findByLicense($license);
		if ( !is_null($customer) ) {

			$last_v = Versions::model()->find("status={$customer->status} ORDER BY date DESC");
			$last_v = $last_v->name;

			$meta = [
				"licence"			=> $license,
				"latest_version"	=> $last_v,
			];
			
			$vd = $customer->versionsDownloads;
			if (!empty($vd)) {
				$vd = end($vd);
				$v  = $vd->v;
				$meta["current_version"] = ($v)?$v->name:'';
				$meta["current_status"]	 = ($v)?$v->getStatusNameByLang('en'):'';
			}

			echo json_encode($meta);
			
		} else {
			echo 0;
		}
		
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

	public function actionActivate($licenseString)
	{
		$parts = explode('hostname', $licenseString);
		$customersList = Customers::model()->findAll();
		foreach ($customersList as $customer)
		{
			if ($customer->license == $parts[0])
			{
				$sql = "UPDATE customers SET site = '" . $parts[1] . "' WHERE license = '" . $parts[0] . "' AND site IS NULL OR LENGTH(site)=0";
       			$connection=Yii::app()->db;
        		$command=$connection->createCommand($sql);
        		if($command->execute())
        		{
        			echo 'success';
        		}
			}
		}
	}

	public function actionCheck($checkString)
	{
		$customersList = Customers::model()->findAll();
		$parts = explode('hostname', $checkString);
		foreach ($customersList as $customer)
		{
			if ($customer->license === $parts[0] and $customer->site === $parts[1])
			{
				echo "exists";
			}
			else
			{
				echo "doesn't exist";
			}
		}
	}

	public function actionTests ()
	{
		$file = file_get_contents('tests.php', FILE_USE_INCLUDE_PATH);
		echo $file;
	}
}