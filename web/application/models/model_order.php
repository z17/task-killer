<?php
class Model_Order extends Model
{
    public function get_data()
    {	
		$data['date'] = isset($_POST['date']) ? $_POST['date'] : NULL;
		$data['task'] = isset($_POST['task']) ? $_POST['task'] : NULL;		
		$data['itemId'] = isset($_POST['itemId']) ? $_POST['itemId'] : NULL;
		$data['fl'] = isset($_POST['fl']) ? $_POST['fl'] : false;

		if ($data['fl']) 
		{			
			$data['errors'] = array();
			
			if ($data['date'] == NULL)
			{
				$str = "Не указана дата";
				array_push($data['errors'],$str);
			}
			$currentDate = date("Y-m-d");
			$data['date'] = explode("-",$data['date']);
			$data['date'] = $data['date'][2]."-".$data['date'][1]."-".$data['date'][0]; // формирование даты в нужное представление для базы
			if ((strtotime($currentDate) > strtotime($data['date'])) or (!preg_match("/\d\d\d\d-\d\d-\d\d/",$data['date'])))
			{
				$str = 'Некорректная дата';
				array_push($data['errors'],$str);
			}

			if ($data['itemId'] == NULL)
			{
				$str = "Не выбран предмет";
				array_push($data['errors'],$str);
			}
			// вероятно это стоит вынести в 1 функцию, а то дублирование кода
			if (!empty($_FILES['file1']['name']))
			{
				$url = explode('.', $_FILES['file1']['name']);
				$format = array_pop($url);
				if ((strtolower($format) != 'jpg') and (strtolower($format) != 'gif') and (strtolower($format) != 'png'))
				{
					$str = "Недопустимый формат файла №1";
					array_push($data['errors'],$str);
				}
				$name = md5(implode($url));		// создаём уникальное имя
				$uploadfile = $_SERVER['DOCUMENT_ROOT']."/files/".$name.".".$format;
				move_uploaded_file($_FILES['file1']['tmp_name'], $uploadfile);
			}
			if (!empty($_FILES['file2']['name']))
			{
				$url = explode('.', $_FILES['file2']['name']);
				$format = array_pop($url);
				if ((strtolower($format) != 'jpg') and (strtolower($format) != 'gif') and (strtolower($format) != 'png'))
				{
					$str = "Недопустимый формат файла №2";
					array_push($data['errors'],$str);
				}
				$name = md5(implode($url));
				$uploadfile = $_SERVER['DOCUMENT_ROOT']."/files/".$name.".".$format;
				move_uploaded_file($_FILES['file2']['tmp_name'], $uploadfile);
			}
			if (!empty($_FILES['file3']['name']))
			{
				$url = explode('.', $_FILES['file3']['name']);
				$format = array_pop($url);
				if ((strtolower($format) != 'jpg') and (strtolower($format) != 'gif') and (strtolower($format) != 'png'))
				{
					$str = "Недопустимый формат файла №3";
					array_push($data['errors'],$str);
				}
				$name = md5(implode($url));
				$uploadfile = $_SERVER['DOCUMENT_ROOT']."/files/".$name.".".$format;
				move_uploaded_file($_FILES['file3']['tmp_name'], $uploadfile);
			}
		}
		else
		{
		}
		
		$data['items'] = $this -> base -> getItems();
		$data['navkac'] = 'order';
		$data['title'] = "Оформление заказа";
		return $data;

    }
}