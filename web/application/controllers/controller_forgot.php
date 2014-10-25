<?php
class Controller_Forgot extends Controller
{

	function __construct()
    {
        $this->model = new Model_Forgot();
        $this->view = new View();
    }
	
    function action_index()
    {		
        $data = $this->model->get_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('forgot_view.php', 'template_view.php', $data);
    }

}