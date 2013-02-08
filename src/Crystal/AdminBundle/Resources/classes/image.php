<?php
	namespace Crystal\AdminBundle\Resources\classes;

	class image
	{
		var $img;

		function __GET($name)
		{
			return $this->$name;
		}

		function __SET($name, $value)
		{
			$this->$name = $value;
		}

		function upload($name = '')
		{
			if($name == '')
			{
				$range = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
				for($i = 0; $i < 12; $i++)
				{ 
					$name .= substr($range, rand(0,62), 1);
				}
			}
			
			$folder = 'pics';
			$type = explode('image/', $this->img->getClientMimeType());
		
			$file = $folder . '/' . $name .'.'. $type[1];
			$this->img->move('pics', $file);
			return $file;

		}

		function checkErrors()
		{
			$size = $this->img->getsize();
			$maxSize = '50000000';
			if($size < $maxSize)
			{
				$fullType = explode('image/', $this->img->getClientMimeType());
				$type = $fullType[1];
				if($type == 'gif' || $type == 'pjpeg' || $type == 'bmp' || $type == 'png' || $type == 'jpg' || $type == 'jpeg')
				{
					$error = 'NoError';
				}
				else
				{
					$error = 'Type Error';
				}
			}
			else
			{
				$error = 'Size Error';
			}
			return $error;
		}
	}

?>