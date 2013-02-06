<?php
	namespace Crystal\rutasBundle\Resources\classes;

	class audio
	{
		var $audio;

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
			
			$folder = 'audio';
			$type = explode('audio/', $this->audio->getClientMimeType());
		
			$file = $folder . '/' . $name .'.'. $type[1];
			$this->audio->move('audio', $file);
			return $file;

		}

		function checkErrors()
		{
			$size = $this->audio->getsize();
			$maxSize = '104857600';
			if($size < $maxSize)
			{
				$fullType = explode('audio/', $this->audio->getClientMimeType());
				$type = $fullType[1];
				if($type == 'mp3' || $type == 'ogg')
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