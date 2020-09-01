<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{


    public function users()
    {
        $this->db->join('user_role', 'user_role.id=user.role_id', 'LEFT');
        
        return $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function EditData()
    {

        $name  = $this->input->post('name');
        $email = $this->input->post('email');
        $id_user = $this->input->post('id_user');

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->where('id_user', $id_user);
        $this->db->update('user');
    }
}
