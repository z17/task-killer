<?php
class Model_Main extends Model
{
    public function get_data()
    {				
		$data['navkac'] = 'main';
		$data['title'] = "Главная страница";
		return $data;
		
    }
}