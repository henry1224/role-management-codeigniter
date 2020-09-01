<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{


    public function users()
    {
        return $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function getAll()
    {

        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id=user.role_id', 'LEFT');
        return $this->db->get()->result_array();
    }

    public function AddData()
    {
        $password = $this->input->post('password', true);
        $data = [
            "name"         => $this->input->post('name', true),
            "username"     => $this->input->post('username', true),
            "email"        => $this->input->post('email', true),
            "image"        => 'default.jpg',
            "password"     => password_hash($password, PASSWORD_DEFAULT),
            "role_id"      => $this->input->post('role_id', true),
            "is_active"    => $this->input->post('is_active', true),
            "date_created" => date('d/m/Y H:i:s A')

        ];

        $this->db->insert('user', $data);
    }


    public function EditData()
    {
        $password = $this->input->post('password', true);
        $data = [
            "name"         => $this->input->post('name', true),
            "username"     => $this->input->post('username', true),
            "email"        => $this->input->post('email', true),
            "role_id"      => $this->input->post('role_id', true),
            "is_active"    => $this->input->post('is_active', true),
            "date_created" => date('d/m/Y H:i:s A')

        ];


        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function getById($id) // memanggil semua data didatabase untuk ditampilkan 
    {

        return $this->db->get_where('user', ['id_user' => $id])->row();
    }


    public function DeleteData($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }
}
