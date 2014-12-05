<?php
class Model_Solve extends Model
{	
    public function get_data()
    {
		$data['tasks'] = $this -> base -> getAllActiveTasks($this -> user['id']);
		foreach ($data['tasks'] as  &$task)
		{
			$task['name_item'] = $this -> base -> getItemById($task['id_item']); 
			$task['time_start'] = date("d.m.Y", strtotime($task['time_start']));
			$task['time_end'] = date("d.m.Y", strtotime($task['time_end']));
			$task['text'] = substr($task['text'], 0, 350); 
			if ($task['id_performer'] == $this -> user['id'])	// если исполнитель = текущему пользователю
			{
				$task['performed'] = true;
			}
			else
			{
				$task['performed'] = false;
			}
			if ($this -> user['id_group'] == 2)
			{
				$task['price'] *= $this -> ratio;
			}
		}
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
	
	public function get_taketask_data()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : NULL;	
		
		$data['task'] = $this -> base -> getTaskById($id);
		
		if ($data['task']['id_performer'] == 0 and $data['task']['status'] == 'started')
		{
			$this -> base -> takeTask($id, $this -> user['id']);
			$data['message'] = 'Отлично, вы взяли задание';			
		}
		else
		{
			$data['message'] = 'Задание взял уже кто-то другой, <a href="/solve">вернуться</a>';	
		}
		
		$data['title'] = 'Взять задание';
		
		
		return $data;
	}
	
	public function get_mytasks_data()
	{
		$data['tasks'] = $this -> base -> getAllTasksByPerformer($this -> user['id']);
		foreach ($data['tasks'] as  &$task)
		{
			$task['name_item'] = $this -> base -> getItemById($task['id_item']); 
			$task['time_start'] = date("d.m.Y", strtotime($task['time_start']));
			$task['time_end'] = date("d.m.Y", strtotime($task['time_end']));
			$task['text'] = substr($task['text'], 0, 350); 
			if ($task['status'] == 'performed')		// если статус выполнение
			{
				$task['performed'] = true;
			}
			else
			{
				$task['performed'] = false;
			}
		}
		$data['title'] = "Задачи";
		return $data;
	}
	
	public function get_one_data()
	{
		$url = $_SERVER['REQUEST_URI'];
		$routes = explode('/', $url);
		$cleanurl = array_pop($routes);
		$data['task'] = $this->base->getTaskById($cleanurl);
		
		if ($data['task'] == false)
		{
			Route::ErrorPage404();		
		}
		
		
		$data['task']['name_item'] = $this -> base -> getItemById($data['task']['id_item']); 
		$data['task']['time_start'] = date("d.m.Y", strtotime($data['task']['time_start']));
		$data['task']['time_end'] = date("d.m.Y", strtotime($data['task']['time_end']));
		$data['task']['time_left'] = round((strtotime($data['task']['time_end']) - time()) / 60 / 60 / 24);
		
		$data['title'] = 'Просмотр задачи';
		return $data;
		
	}	
}