<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
	}
	

	public function index()
	{
		$this->db->order_by('result_id', 'desc');
		$this->db->limit(1);
		$data = $this->db->get('result')->row();
		
        $page_data['result']  = $data;
		$this->load->view('home', $page_data);
	}
}
