<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{


    public function users()
    {

        return $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function getAllMenu()
    {
        return $query = $this->db->get('user_menu')->result_array();
    }

    public function AddData()
    {

        $data = [
            "title"         => $this->input->post('title', true),
            "url"           => $this->input->post('url', true),
            "icon"          => $this->input->post('icon', true),
            "is_main_menu"  => $this->input->post('is_main_menu', true),
            "is_active"     => $this->input->post('is_active', true),
        ];

        $this->db->insert('user_menu', $data);
    }


    public function EditData()
    {
        $data = [
            "title"         => $this->input->post('title', true),
            "url"           => $this->input->post('url', true),
            "icon"          => $this->input->post('icon', true),
            "is_main_menu"  => $this->input->post('is_main_menu', true),
            "is_active"     => $this->input->post('is_active', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function getById($id) // memanggil semua data didatabase untuk ditampilkan 
    {

        return $this->db->get_where('user_menu', ['id' => $id])->row();
    }


    public function DeleteData($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }
}
