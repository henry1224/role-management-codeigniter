<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation'); //untuk memanggil library form validasi 

	}

	public function index()
	{

		/** cek apakah user sudah login , jika sudah maka tidak bisa kembali ke login kecuali logout */
		if ($this->session->userdata('username')) {
			redirect('home');
		}

		$data['title'] = 'LOGIN';

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// validasi success
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		//user available
		if ($user) {
			// if user active
			if ($user['is_active'] == 1) {
				//jika password same from database
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user'   => $user['id_user'],
						'name' 		=> $user['name'],
						'username'  => $user['username'],
						'role_id'   => $user['role_id']
					];
					$this->session->set_userdata($data);
					//check role user apakah superadmin atau user
					if ($user['role_id'] == 1) {
						//redirect to superadmin menu 
						redirect('dashboard');
					} else {
						//redirect to user menu
						redirect('home');
					}
					// end check user
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger shadow" role="alert">Wrong password! </div>');
					redirect('auth');
				}
				//end check active
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger shadow" role="alert">This username has not been activated! </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger shadow" role="alert">Username is not registered!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('nama');

		$this->session->set_flashdata('message', '<div class="alert alert-success shadow" role="alert">You have been logged out!</div>');
		redirect('auth');
	}


	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
