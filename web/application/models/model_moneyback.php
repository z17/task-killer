<?php
class Model_Moneyback extends Model
{
    public function get_data()
    {	
		if (!isset($_SESSION['userid']))
		{
			Route::ErrorAccess();
		}	
		
		$data['outSum'] = isset($_POST['outSum']) ? $_POST['outSum'] : NULL;
		$data['wmr'] = isset($_POST['wmr']) ? $_POST['wmr'] : NULL;
		$data['fl'] = isset($_POST['fl']) ? $_POST['fl'] : false;
		$data['outSum'] = trim($data['outSum']); // убираем пробелы
		$data['wmr'] = trim($data['wmr']); // убираем пробелы
		
		if ($data['fl'])
		{	
			$data['errors'] = array();	
			$data['user'] = $this -> user; // получаем данные пользователя
			
			if (is_numeric($data['outSum']) and ($data['outSum'] < 15))
			{
				$str = "Минимальная сумма выплаты 15 рублей";
				array_push($data['errors'],$str);
			}
			if (!is_numeric($data['outSum']))
			{
				$str = "Некорректная сумма вывода";
				array_push($data['errors'],$str);
			}
			// надо бы дописать проверку корректности WMR счета
			if ($data['user']['balance'] < $data['outSum'])
			{
				$str = "Недостаточно средств для вывода";
				array_push($data['errors'],$str);
			}
			if (empty($data['errors']))
			{
				// если ошибок нет - добавляем в базу запись о запросе вывода
				$this -> base -> addMoneybacklog($data['user']['id'],$data['outSum'],$data['wmr']);
				$data['message'] = "В течении недели вам будет перечислен платёж";							
			}
			else
			{
				$data['message'] = "Ошибка:";				
			}
		}
		else
		{
			$data['message'] = "Выплаты возможны не чаще одного раза в неделю на ваш WMR кошелёк.<br>Минимальная сумма выплаты - 15 рублей.";
		}
		
		$data['title'] = "Вывод средств";
		return $data;		
    }
}