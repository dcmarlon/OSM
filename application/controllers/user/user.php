<?php

    class User extends Admin_Controller{
        
        function __construct ()
	{
		parent::__construct();
	}
        
       public function index ()
	{

		$this->load->view('admin/survey/user/home');
	}

    }