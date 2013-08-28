<?php
class Controller_Errors extends Controller
{
    function action_index()
    {	
        $this->view->generate('errors_view.php', 'template_view.php');
    }
	function action_access()
    {	
        $this->view->generate('errors_access_view.php', 'template_view.php');
    }
	function action_404()
    {	
        $this->view->generate('errors_404_view.php', 'template_view.php');
    }
}