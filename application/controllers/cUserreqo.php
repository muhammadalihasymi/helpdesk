<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUserreqo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mReqo');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->model('mReqo');
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['net'] = $this->mReqo->get_req();
        $this->load->view('admin/vreqo', $data);
    }
    function tambah()
    {
        $data['tittle'] = 'Request Office';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['net'] = $this->mReqo->get_req();
        $this->load->view('templates/vHeader', $data);
        $this->load->view('user/vReqoadd', $data);
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
        $this->mReqo->input_data($data, 'reqo');
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
        $data['soft'] = $this->mReqo->get_req();
        $data['req'] = $this->mReqo->edit_data($where, 'reqo')->result();
        $this->load->view('admin/vReqoedit', $data);
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

        $this->mReqo->update_data($where, $data, 'reqo');
        redirect('cUserreqo');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->mReqo->hapus_data($where, 'reqo');
        redirect('cUserreqo');
    }
}
