<?php
class Controller_Solve extends Controller
{
	function __construct()
    {
        $this -> model = new Model_Solve();
        $this -> view = new View();
		if( $this -> model -> user['id_group'] != 3 and $this -> model -> user['id_group'] != 2 )
		{
			Route::ErrorAccess();
		}
    }
	
    function action_index()
    {		
        $data = $this->model->get_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('solve/solve_view.php', 'solve/template_view.php', $data);
    }
	
	function action_additem()
    {		
        $data = $this->model->get_additem_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('solve/additem_view.php', 'solve/template_view.php', $data);
    }
	
	function action_taketask()
	{       
		$data = $this -> model -> get_taketask_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('solve/taketeask_view.php', 'solve/template_view.php', $data);
	}
	
		function action_mytasks()
	{       
		$data = $this -> model -> get_mytasks_data();
		$data['user'] = $this -> model -> user;
        $this->view->generate('solve/mytasks_view.php', 'solve/template_view.php', $data);
	}
	
	function action_default()
    {		
        $data = $this->model->get_one_data();
        $this->view->generate('solve/solve_one_view.php', 'solve/template_view.php', $data);
    }
}