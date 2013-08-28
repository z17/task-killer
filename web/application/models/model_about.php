<?php
class Model_About extends Model
{
    public function get_data()
    {				
		$data['navkac'] = 'about';
		$data['title'] = "О нас";
		return $data;
		
    }
}