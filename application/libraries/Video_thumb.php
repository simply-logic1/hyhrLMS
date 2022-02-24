<?php
/**
 * Simple FFmpeg helper class
 */
class Video_thumb {

	public function __construct()
	{

		$baseurl=base_url();
		$this->ffmpeg_path = "D:/xampp/htdocs/saranya/online-courses/asset/ffmpeg/bin/ffmpeg.exe";
		
		$this->thumbs_path = "D:/xampp/htdocs/saranya/online-courses/asset/course_video/video_thumb/";
	}
	
	/**
	 * Get video and codec info using ffprobe
	 *
	 * @param string $in_file (path to file)
	 * @return array
	 */


	/**
	 * Generate frames from video using ffmpeg
	 *
	 * @param string $in_file (path to file)
	 * @param string $out_folder (path to thumbs folder)
	 * @param string $count (how many frames to render from video)
	 * @return bool
	 */
	function ffmpeg_screens($in_file, $out_folder, $count=1)
	{
		$out_file = $this->thumbs_path;
		
		if (!in_array('exec', explode(', ', ini_get('disable_functions')))) {
			//Make thumbs dir
			if (!file_exists($out_file)) {
				mkdir($out_file, 755, true);
			}

			//Get ffprobe info
			

			//Loop exec and get video frames
			
				$interval=10;
				
					$cmd = $this->ffmpeg_path.' -ss '.$interval.' -i "'.$in_file.'" -t 00:00:01 -r 1 -f mjpeg "'.$out_file.'/'.$out_folder.'.png"';
				
				exec($cmd);
				return true;
			
			
		} else {
			return false;
		}
	}
}
