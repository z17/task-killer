<?php
class Controller_Login extends Controller
{

	function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }
	
    function action_index()
    {		
        $data = $this->model->get_data();		
		$data['user'] = $this -> model -> user;
        $this->view->generate('login_view.php', 'template_guest_view.php', $data);
    }

}