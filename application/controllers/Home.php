<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
	}
	

	public function index()
	{
		
		
		$page_data['page_name']  = 'home';
		$this->load->view('index', $page_data);
	}
}
