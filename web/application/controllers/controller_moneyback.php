<?php
class Controller_Moneyback extends Controller
{

	function __construct()
    {
        $this->model = new Model_Moneyback();
        $this->view = new View();
    }
	
    function action_index()
    {		
        $data = $this->model->get_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('moneyback_view.php', 'template_view.php', $data);
    }

}