<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// if (!$this->users->access_page()){
		// 	redirect('auth');
		// }

	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['title'] = 'Dashboard';
		$this->load->view('templates/admin/admin_header', $data);
		$this->load->view('admin/admin');
		$this->load->view('templates/admin/admin_footer');
	}
}
