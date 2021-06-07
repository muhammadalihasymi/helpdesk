<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUserreqn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mReqn');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->model('mReqn');
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['net'] = $this->mReqn->get_net();
        $this->load->view('admin/vReqn', $data);
    }
    function tambah()
    {
        $data['tittle'] = 'Request Network';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['net'] = $this->mReqn->get_net();
        $this->load->view('templates/vHeader', $data);
        $this->load->view('user/vReqnadd', $data);
        $this->load->view('templates/vFooter');
    }
    function tambah_aksi()
    {
        $user = $this->input->post('user');
        $email = $this->input->post('email');
        $exp = $this->input->post('exp');
        $process = $this->input->post('process');

        $data = array(
            'user' => $user,
            'email' => $email,
            'exp' => $exp,
            'status' => $process
        );
        $this->mReqn->input_data($data, 'reqn');
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
        $data['soft'] = $this->mReqn->get_net();
        $data['req'] = $this->mReqn->edit_data($where, 'reqn')->result();
        $this->load->view('admin/vReqnedit', $data);
    }
    public function update()
    {
        $id_soft = $this->input->post('id');
        $user = $this->input->post('user');
        $email = $this->input->post('email');
        $exp = $this->input->post('exp');
        $stat = $this->input->post('stat');

        $data = array(
            'id' => $id_soft,
            'user' => $user,
            'email' => $email,
            'exp' => $exp,
            'status' => $stat
        );

        $where = array(
            'id' => $id_soft
        );

        $this->mReqn->update_data($where, $data, 'reqn');
        redirect('cUserreqn');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->mReqn->hapus_data($where, 'reqn');
        redirect('cUserreqn');
    }
}
