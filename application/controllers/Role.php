<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model(['Role_model', 'Menu_model']);
        is_logged_in(); // mengecek role management yang diberi akses
    }

    public function index()
    {
        $data['user']   = $this->Role_model->users();
        $data['title']  = 'Role Management';
        $data['role']   = $this->Role_model->getAll();
        $this->form_validation->set_rules('role', 'Role Management', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/role/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Role_model->AddData();
            $this->session->set_flashdata('add', 'Tambahkan');
            redirect('Role/index');
        }
    }

    public function Edit()
    {
        $this->Role_model->EditData();
        $this->session->set_flashdata('edit', 'Ubah');
        redirect('role');
    }

    public function Delete($id)
    {
        $this->Role_model->DeleteData(($id));
        $this->session->set_flashdata('delete', 'Hapus');
        redirect('role');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Accesss';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->Role_model->getRoleAccess($role_id);
        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('management/role/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('change', 'Access Change!');
    }
}
