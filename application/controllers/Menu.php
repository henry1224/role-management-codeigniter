<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Menu_model');
        is_logged_in();
    }

    public function index()
    {
        $data['user']   = $this->Menu_model->users();
        $data['title']  = 'Menu Management';
        $data['menu']   = $this->Menu_model->getAllMenu();

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->AddData();
            $this->session->set_flashdata('add', 'Tambahkan');
            redirect('menu/index');
        }
    }

    public function Edit()
    {
        $this->Menu_model->EditData();
        $this->session->set_flashdata('edit', 'Ubah');
        redirect('menu');
    }

    public function Delete($id)
    {
        $this->Menu_model->DeleteData(($id));
        $this->session->set_flashdata('delete', 'Hapus');
        redirect('menu');
    }
}
