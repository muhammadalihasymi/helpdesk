<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAdminuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mUser');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->relasi();
    }
    public function relasi()
    {
        $this->load->model('mUser');
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->mUser->get_relasi();
        $data['role'] = $this->mUser->get_role();
        $this->load->view('admin/vUser', $data);
    }
    public function edit($id)
    {
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['role'] = $this->mUser->get_role();
        $data['users'] = $this->mUser->edit_data($where, 'user')->result();
        $this->load->view('admin/vUser_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $role = $this->input->post('role');

        $data = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'role_id' => $role
        );

        $where = array(
            'id' => $id
        );

        $this->mUser->update_data($where, $data, 'user');
        redirect('cAdminuser');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->mUser->hapus_data($where, 'user');
        redirect('cAdminuser');
    }
}
