<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
			'required' => 'Email tidak boleh kosong',
			'valid_email' => 'Isi dengan format email'
		]);
		$this->form_validation->set_rules('password', 'Email', 'required|trim', [
			'required' => 'Password tidak boleh kosong'
		]);

		if ($this->form_validation->run() == false){
			$data['title'] = 'Halam Utama';
			$this->load->view('templates/auth/auth_header', $data);
			$this->load->view('login');
			$this->load->view('templates/auth/auth_footer');
		}else{
			$this->_login();
		}
	}

	private function _login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if ($user) {

			if ($user['is_active'] == 1){

				if (password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
					];

					$this->session->set_userdata($data);
					redirect('dashboard');

				}else{
					$this->session->set_flashdata('message', '<div class="alert-danger" role="alert">Password salah!</div>');
					redirect('auth');
				}

			}else{
				$this->session->set_flashdata('message', '<div class="alert-danger" role="alert">Email belum active, silahkan aktivasi</div>');
				redirect('auth');
			}

		}else{
			$this->session->set_flashdata('message', '<div class="alert-danger" role="alert">Email belum terdaftar!</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Nama tidak boleh kosong'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[user.email]', [
			'required' => 'Email tidak boleh kosong',
			'is_unique' => 'Email sudah terdaftar',
			'valid_email' => 'Isi dengan format email'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password1]', [
			'required' => 'Password tidak boleh kosong',
			'min_length' => 'Password minimal 3 Karakter',
			'matches' => 'Password dont match'
		]);

		$this->form_validation->set_rules('password1', 'Password', 'matches[password]');

		if ($this->form_validation->run() == false){
			$data['title'] = 'Register';
			$this->load->view('templates/auth/auth_header', $data);
			$this->load->view('register');
			$this->load->view('templates/auth/auth_footer');
		}else{
			$this->auth_model->create_user();
			redirect('auth');
		}
	}
	public function logout(){
		$this->session->unset_userdata('email');
		// $this->session->destroy();
		redirect('auth');
	}

}
