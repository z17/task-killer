<?php
class Controller_Pay extends Controller
{

	function __construct()
    {
        $this->model = new Model_Pay();
        $this->view = new View();
    }
	
    function action_index()
    {		
        $data = $this->model->get_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('pay_view.php', 'template_view.php', $data);
    }

}