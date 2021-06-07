<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cItems extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mItem');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['item'] = $this->mItem->get_soft()->result();
        $this->load->view('admin/vItems', $data);
    }
    public function tambah()
    {
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/vItems_add', $data);
    }
    public function tambah_aksi()
    {
        $name = $this->input->post('item');
        $data = array(
            'item' => $name,
        );
        $this->mItem->input_data($data, 'items');
        redirect('cItems');
    }
    public function edit($id)
    {
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['item'] = $this->mItem->edit_data($where, 'items')->result();
        $this->load->view('admin/vItems_edit', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('item');
        $data = array(
            'id' => $id,
            'item' => $name
        );
        $where = array(
            'id' => $id
        );
        $this->mItem->update_data($where, $data, 'items');
        redirect('cItems');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->mItem->hapus_data($where, 'items');
        redirect('cItems');
    }
}
