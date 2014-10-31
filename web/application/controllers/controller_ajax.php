<?php
class Controller_Ajax extends Controller
{

	function __construct()
    {
        $this->model = new Model_Ajax();
        $this->view = new View();
    }
	
    function action_index()
    {		
        $data = $this->model->get_data();
		$data['user'] = $this -> model -> user;
        $this->view->generateAjax('ajax_view.php', $data);
    }

}