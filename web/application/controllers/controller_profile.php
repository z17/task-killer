<?php
class Controller_Profile extends Controller
{

	function __construct()
    {
        $this->model = new Model_Profile();
        $this->view = new View();
    }
	
    function action_index()
    {		
        $data = $this->model->get_data();
		$data['user'] = $this -> model -> user;
		if ($data['user'])	// если авторизован, то показываем профиль, если нет - форма входа без sidebar
		{
			$this->view->generate('profile_view.php', 'template_view.php', $data);
		}
		else
		{
			$this->view->generate('profile_view.php', 'template_guest_view.php', $data);
		}
    }
	function action_edit()
    {		
		$data['user'] = $this -> model -> user;
        $data = $this->model->get_edit_data();
        $this->view->generate('profile_edit_view.php', 'template_view.php', $data);
    }
	function action_exit()
	{	
		$data = $this->model->get_exit_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('profile_exit_view.php', 'template_guest_view.php', $data);
	}
}