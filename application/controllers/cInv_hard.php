<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cInv_hard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mInv_hard');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->relasi();
    }
    public function relasi()
    {
        $this->load->model('mInv_hard');
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->mInv_hard->get_relasi();
        $data['hard'] = $this->mInv_hard->get_hard();
        $this->load->view('admin/vInv_hard', $data);
    }
    function tambah()
    {
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hard'] = $this->mInv_hard->get_hard();
        $this->load->view('admin/vInv_hard_add', $data);
    }
    function tambah_aksi()
    {
        $item = $this->input->post('item');
        $type = $this->input->post('type');
        $total = $this->input->post('total');
        $con = $this->input->post('con');

        $data = array(
            'item_id' => $item,
            'type' => $type,
            'total' => $total,
            'con_id' => $con
        );
        $this->mInv_hard->input_data($data, 'hardware');
        redirect('cInv_hard');
    }
    public function edit($id_hard)
    {
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id_hard' => $id_hard);
        $data['hard'] = $this->mInv_hard->get_hard();
        $data['hardware'] = $this->mInv_hard->edit_data($where, 'hardware')->result();
        $this->load->view('admin/vInv_hard_edit', $data);
    }
    public function update()
    {
        $id_hard = $this->input->post('id');
        $item = $this->input->post('item');
        $type = $this->input->post('type');
        $total = $this->input->post('total');
        $con = $this->input->post('con');

        $data = array(
            'id_hard' => $id_hard,
            'item_id' => $item,
            'type' => $type,
            'total' => $total,
            'con_id' => $con
        );

        $where = array(
            'id_hard' => $id_hard
        );

        $this->mInv_hard->update_data($where, $data, 'hardware');
        redirect('cInv_hard');
    }
    public function hapus($id_hard)
    {
        $where = array('id_hard' => $id_hard);
        $this->mInv_hard->hapus_data($where, 'hardware');
        redirect('cInv_hard');
    }
}
