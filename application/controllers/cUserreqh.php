<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUserreqh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mReqh');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->relasi();
    }
    public function relasi()
    {
        $this->load->model('mReqh');
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['req'] = $this->mReqh->get_req();
        $this->load->view('admin/vReqh', $data);
    }
    function tambah()
    {
        $data['tittle'] = 'Request Hardware';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hard'] = $this->mReqh->get_hard();
        $data['data'] = $this->mReqh->get_relasi();
        $data['req'] = $this->mReqh->get_req();
        $this->load->view('templates/vHeader', $data);
        $this->load->view('user/vReqhadd', $data);
        $this->load->view('templates/vFooter');
    }
    function tambah_aksi()
    {
        $user = $this->input->post('user');
        $email = $this->input->post('email');
        $item = $this->input->post('item');
        $exp = $this->input->post('exp');
        $process = $this->input->post('process');

        $data = array(
            'user' => $user,
            'email' => $email,
            'item' => $item,
            'exp' => $exp,
            'status' => $process
        );
        $this->mReqh->input_data($data, 'reqh');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your request is in the process !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('cUser');
    }
    public function edit($id_hard)
    {
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id_hard);
        $data['hard'] = $this->mReqh->get_hard();
        $data['req'] = $this->mReqh->edit_data($where, 'reqh')->result();
        $this->load->view('admin/vReqhedit', $data);
    }
    public function update()
    {
        $id_hard = $this->input->post('id');
        $user = $this->input->post('user');
        $email = $this->input->post('email');
        $item = $this->input->post('item');
        $exp = $this->input->post('exp');
        $stat = $this->input->post('stat');

        $data = array(
            'id' => $id_hard,
            'user' => $user,
            'email' => $email,
            'item' => $item,
            'exp' => $exp,
            'status' => $stat
        );

        $where = array(
            'id' => $id_hard
        );

        $this->mReqh->update_data($where, $data, 'reqh');
        redirect('cUserreqh');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->mReqh->hapus_data($where, 'reqh');
        redirect('cUserreqh');
    }
}
