<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
	}
	

	public function index()
	{
		if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($this->session->userdata('student_login') == 1)
            redirect(site_url('student/dashboard'), 'refresh');
	}

	function dashboard()
    {
        if ($this->session->userdata('student_login') != 1)
			redirect(site_url('login'), 'refresh');
			
        $page_data['page_name']  = 'dashboard';
        $page_data['page_ket']  = 'Beranda';
        $page_data['page_title'] = 'Dashboard';
        
        $this->load->view('index', $page_data);
    }

    function sholat()
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');
            

        $data = $this->db->get_where('activity_bank', array())->result_array();
        
        $page_data['data']  = $data;
        $page_data['page_name']  = 'sholat';
        $page_data['page_ket']  = 'Sholat';
        $page_data['page_title'] = 'Sholat';
        
        $this->load->view('index', $page_data);
    }

    function new_activity(){
        if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');

        $data['activity_bank_id']      = $this->input->post('activity_bank_id');
        $data['student_id']      = $this->session->userdata('student_id');
        $data['time_hp']      = strtotime(date("Y-m-d H:i:s"));
        $data['time_server']  =  strtotime(date("Y-m-d H:i:s"));
        $data['date']      = date("Y-m-d");
        $this->db->insert('activity_result', $data);

        redirect(site_url('student/sholat'), 'refresh');
    }

    function data_activity(){
        $this->db->select('c.name as cn, sc.name as scn, sb.name as sbn, t.name as tn, cr.time_start as crts, cr.time_start_min as crtsm, cr.time_end as crte, cr.time_end_min as crtem, o.status as stts');
        $this->db->from('class_routine cr');
        $this->db->join('class c', 'cr.class_id = c.class_id');
        $this->db->join('section sc', 'cr.section_id = sc.section_id');
        $this->db->join('subject sb', 'cr.subject_id = sb.subject_id');
        $this->db->join('teacher t', 'sb.teacher_id = t.teacher_id');
        $this->db->join('online o', 't.teacher_id = o.user_id', 'left');
        $this->db->where('cr.day', date('l'));
        $this->db->where('CAST(concat(HOUR(now()), ":", minute(now())) AS time) BETWEEN CAST(concat(time_start,":",time_start_min) AS time) and CAST(concat(time_end,":",time_end_min) AS time)');
        $this->db->order_by('sc.section_id', 'asc');
        $query = $this->db->get();
        $data = $query->result_array();
        echo json_encode($data);
    }

    function result()
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $this->db->order_by('result_id', 'desc');
        $data = $this->db->get('result')->result_array();
			
        $page_data['page_name']  = 'result';
        $page_data['result']  = $data;
        $page_data['page_ket']  = 'List Result';
        $page_data['page_title'] = 'Data Result';
        
        $this->load->view('backend/index', $page_data);
    }

    function result_add()
    {
        if ($this->session->userdata('student_login') != 1)
			redirect(site_url('login'), 'refresh');
			
        $page_data['page_name']  = 'result_add';
        $page_data['page_ket']  = 'Tambah Result';
        $page_data['page_title'] = 'Tambah Data Result';
        
        $this->load->view('backend/index', $page_data);
    }

    function result_edit($id)
    {
        if ($this->session->userdata('student_login') != 1)
			redirect(site_url('login'), 'refresh');
        
        $data = $this->db->get_where('result', array('result_id' => $id))->row();

        $page_data['page_name']  = 'result_edit';
        $page_data['page_ket']  = 'Edit Result';
        $page_data['result']  = $data;
        $page_data['page_title'] = 'Edit Data Result';
        
        $this->load->view('backend/index', $page_data);
    }

    function result_save()
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $hari = date("l", strtotime($this->input->post('tanggal')));
        if ($hari == "Sunday") {
            $nmhari = "Minggu";
        }elseif ($hari == "Monday") {
            $nmhari = "Senin";
        }elseif ($hari == "Tuesday") {
            $nmhari = "Selasa";
        }elseif ($hari == "Wednesday") {
            $nmhari = "Rabu";
        }elseif ($hari == "Thursday") {
            $nmhari = "Kamis";
        }elseif ($hari == "Friday") {
            $nmhari = "Jumat";
        }else{
            $nmhari = "Sabtu";
        }
        
        $data['tanggal']      = html_escape($this->input->post('tanggal'));
        $data['hari']      = $nmhari;
        $data['tgl']      = date("d", strtotime($this->input->post('tanggal')));
        $data['bulan']      = date("M", strtotime($this->input->post('tanggal')));
        $data['tahun']      = date("Y", strtotime($this->input->post('tanggal')));
        $data['result']      = html_escape($this->input->post('result'));
        $this->db->insert('result', $data);

        $this->session->set_flashdata('flash_message' , 'Data Berhasil Ditambahkan');
        redirect(site_url('student/result'), 'refresh');
    }

    function result_update()
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $hari = date("l", strtotime($this->input->post('tanggal')));
        if ($hari == "Sunday") {
            $nmhari = "Minggu";
        }elseif ($hari == "Monday") {
            $nmhari = "Senin";
        }elseif ($hari == "Tuesday") {
            $nmhari = "Selasa";
        }elseif ($hari == "Wednesday") {
            $nmhari = "Rabu";
        }elseif ($hari == "Thursday") {
            $nmhari = "Kamis";
        }elseif ($hari == "Friday") {
            $nmhari = "Jumat";
        }else{
            $nmhari = "Sabtu";
        }
        
        $id      = html_escape($this->input->post('result_id'));
        $data['tanggal']      = html_escape($this->input->post('tanggal'));
        $data['hari']      = $nmhari;
        $data['tgl']      = date("d", strtotime($this->input->post('tanggal')));
        $data['bulan']      = date("M", strtotime($this->input->post('tanggal')));
        $data['tahun']      = date("Y", strtotime($this->input->post('tanggal')));
        $data['result']      = html_escape($this->input->post('result'));
        
        $this->db->where('result_id', $id);
        $this->db->update('result', $data);

        $this->session->set_flashdata('flash_message' , 'Data Berhasil Diubah');
        redirect(site_url('student/result'), 'refresh');
    }

    function result_del($id)
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $this->db->where('result_id', $id);
        $this->db->delete('result');
        
        $this->session->set_flashdata('flash_message' , 'Data Berhasil Dihapus');
        redirect(site_url('student/result'), 'refresh');
    }

    function history(){
        if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $data = $this->db->get('result')->result_array();
			
        $page_data['page_name']  = 'history';
        $page_data['history']  = $data;
        $page_data['page_ket']  = 'List History';
        $page_data['page_title'] = 'Data History';
        
        $this->load->view('backend/index', $page_data);
    }

    function change_password(){
        if ($this->session->userdata('student_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $data = $this->db->get_where('student', array('student_id' => $this->session->userdata('student_id')))->result_array();
			
        $page_data['page_name']  = 'profile';
        $page_data['profile']  = $data;
        $page_data['page_ket']  = 'Ubah Data';
        $page_data['page_title'] = 'Ubah Profile';
        
        $this->load->view('backend/index', $page_data);
    }

    function update_password(){
        $data['name']             = $this->input->post('name');
        $data['username']             = $this->input->post('username');

        $data['password']             = sha1($this->input->post('password'));
        $data['new_password']         = sha1($this->input->post('new_password'));
        $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

        $current_password = $this->db->get_where('student', array(
            'student_id' => $this->session->userdata('student_id')
        ))->row()->password;
        if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
            $this->db->where('student_id', $this->session->userdata('student_id'));
            $this->db->update('student', array(
                'password' => $data['new_password'],
                'name' => $data['name'],
                'username' => $data['username']
            ));
            $this->session->set_flashdata('flash_message', 'Password Berhasil Dirubah');
            redirect(site_url('student/dahsboard'), 'refresh');
        } else {
            $this->session->set_flashdata('error_message', 'Parword Tidak Sama');
            redirect(site_url('student/change_password'), 'refresh');
        }
        
    }
}
