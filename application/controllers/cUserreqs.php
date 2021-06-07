<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUserreqs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mReqs');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->model('mReqs');
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['req'] = $this->mReqs->get_req();
        $this->load->view('admin/vReqs', $data);
    }
    function tambah()
    {
        $data['tittle'] = 'Request Software';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['soft'] = $this->mReqs->get_soft();
        $data['req'] = $this->mReqs->get_req();
        $this->load->view('templates/vHeader', $data);
        $this->load->view('user/vReqsadd', $data);
        $this->load->view('templates/vFooter');
    }
    function tambah_aksi()
    {
        $user = $this->input->post('user');
        $item = $this->input->post('item');
        $email = $this->input->post('email');
        $exp = $this->input->post('exp');
        $process = $this->input->post('process');

        $data = array(
            'user' => $user,
            'email' => $email,
            'soft' => $item,
            'exp' => $exp,
            'status' => $process
        );
        $this->mReqs->input_data($data, 'reqs');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your request is in the process !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('cUser');
    }
    public function edit($id_soft)
    {
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id_soft);
        $data['soft'] = $this->mReqs->get_soft();
        $data['req'] = $this->mReqs->edit_data($where, 'reqs')->result();
        $this->load->view('admin/vReqsedit', $data);
    }
    public function update()
    {
        $id_soft = $this->input->post('id');
        $user = $this->input->post('user');
        $email = $this->input->post('email');
        $item = $this->input->post('item');
        $exp = $this->input->post('exp');
        $stat = $this->input->post('stat');

        $data = array(
            'id' => $id_soft,
            'user' => $user,
            'email' => $email,
            'soft' => $item,
            'exp' => $exp,
            'status' => $stat
        );

        $where = array(
            'id' => $id_soft
        );

        $this->mReqs->update_data($where, $data, 'reqs');
        redirect('cUserreqs');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->mReqs->hapus_data($where, 'reqs');
        redirect('cUserreqs');
    }
}
