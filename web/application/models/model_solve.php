<?php
class Model_Solve extends Model
{
    public function get_data()
    {				
		$data['title'] = "Задачи";
		return $data;
		
    }
	public function get_additem_data()
	{
		if (!isset($this->user))
		{
			Route::ErrorAccess();
		}
		
		$data['name'] = isset($_POST['name']) ? $_POST['name'] : NULL;
		$data['price'] = isset($_POST['price']) ? $_POST['price'] : NULL;
		$data['fl'] = isset($_POST['fl']) ? $_POST['fl'] : false;
		$data['name'] = trim($data['name']); // убираем пробелы
		$data['price'] = trim($data['price']); // убираем пробелы
		
		if ($data['fl'])
		{
			$data['errors'] = array();
			if (!is_numeric($data['price']))
			{
				$str = "Некорректная цена";
				array_push($data['errors'],$str);
			}
			if (empty($data['errors']))
			{
				// если ошибок нет - добавляем в базу предмет
				$this -> base -> addItem($data['name'],$data['price']);
				$data['message'] = "Добавлено";							
			}
			else
			{
				$data['message'] = "Ошибка:";				
			}
		}
		else
		{
			$data['message'] = "Заполните форму";
		}
		$data['title'] = "Добавить предмет";
		return $data;
	}
}