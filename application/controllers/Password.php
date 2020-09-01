<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Password_model');
        is_logged_in(); // mengecek role management yang diberi akses
    }
    public function index() //untuk tampilkan seluruh data dari database
    {

        $data['user']   = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat New Password', 'required|trim|min_length[5]|matches[new_password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('utility/password/index', $data);
            $this->load->view('templates/footer');
        } else {

            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {

                $this->session->set_flashdata('password', '<div class="alert alert-danger shadow" role="alert">Wrong Curent password! </div>');
                redirect('password');
            } else {
                if ($current_password == $new_password) {

                    $this->session->set_flashdata('password', '<div class="alert alert-danger shadow" role="alert">New password cannot be the same as Current password! </div>');
                    redirect('password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('edit', 'Ubah');
                    redirect('password');
                }
            }
        }
    }
}
