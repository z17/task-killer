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
        $this->view->generate('profile_view.php', 'template_view.php', $data);
    }
	function action_edit()
    {		
        $data = $this->model->get_edit_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('profile_edit_view.php', 'template_view.php', $data);
    }

}