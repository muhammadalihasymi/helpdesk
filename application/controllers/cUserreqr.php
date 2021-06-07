<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUserreqr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mreqr');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->model('mreqr');
        $data['tittle'] = 'Admin 24slides';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['net'] = $this->mreqr->get_req();
        $this->load->view('admin/vreqr', $data);
    }
    function tambah()
    {
        $data['tittle'] = 'Repair';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['net'] = $this->mreqr->get_req();
        $this->load->view('templates/vHeader', $data);
        $this->load->view('user/vreqradd', $data);
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
        $this->mreqr->input_data($data, 'reqr');
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
        $data['soft'] = $this->mreqr->get_req();
        $data['req'] = $this->mreqr->edit_data($where, 'reqr')->result();
        $this->load->view('admin/vreqredit', $data);
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

        $this->mreqr->update_data($where, $data, 'reqr');
        redirect('cUserreqr');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->mreqr->hapus_data($where, 'reqr');
        redirect('cUserreqr');
    }
}
