<?php
class Controller_Solve extends Controller
{

	function __construct()
    {
        $this->model = new Model_Solve();
        $this->view = new View();
    }
	
    function action_index()
    {		
        $data = $this->model->get_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('solve/solve_view.php', 'solve/template_view.php', $data);
    }

}