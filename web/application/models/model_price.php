<?php
class Model_Price extends Model
{
    public function get_data()
    {			
		$data['price'] = $this -> base -> getItems();
		$data['navkac'] = 'price';
		$data['title'] = "Цены";
		return $data;
		
    }
}