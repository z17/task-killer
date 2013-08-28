<?php
class Model_Order extends Model
{
    public function get_data()
    {	
		$data['navkac'] = 'order';
		$data['title'] = "Оформление заказа";
		return $data;
		
    }
}