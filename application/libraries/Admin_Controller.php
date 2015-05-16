<?php
class Admin_Controller extends MY_Controller{

	function __construct (){
		parent::__construct();
                $this->load->helper('url');
                $this->data['meta_title'] = 'Admin Panel';
                $this->load->helper('form');
		$this->load->helper('html');
                $this->load->library('form_validation'); 
	}
}