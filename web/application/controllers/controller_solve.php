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
        $this->view->generate('solve_view.php', 'template_view.php', $data);
    }

}