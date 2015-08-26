<?php 

class Zip extends ZipArchive {

	/**
	* $excluse - часть пути, котору я мы не будем сохранять в архиве
	*
	**/
	public function addDirectory($dir, $excluse = false)
	{
			var_dump($dir);
		foreach(glob($dir . '/*') as $file)
		{
			if( is_dir($file) )
			{
				if ($excluse) {
					$exfile = str_replace($excluse, '', $file);
				}
				$this->addEmptyDir( $exfile );
				$this->addDirectory( $file, $excluse );
			}
			else
			{
				if ($excluse) {
					$exfile = str_replace($excluse, '', $file);
				}
				$this->addFile($file, $exfile);
			}
		}
	}
}
 
?>