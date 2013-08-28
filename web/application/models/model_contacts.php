<?php
class Model_Contacts extends Model
{
    public function get_data()
    {				
		$data['navkac'] = 'contacts';
		$data['title'] = "Контакты";
		return $data;
		
    }
}