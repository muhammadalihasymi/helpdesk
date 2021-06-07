<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mHistory');
        $this->load->helper('url');
        if (!$this->session->userdata('email')) {
            redirect('cLogin');
        }
    }
    public function index()
    {
        $data['tittle'] = 'Helpdesk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hard'] = $this->mHistory->get_h();
        $data['soft'] = $this->mHistory->get_s();
        $data['net'] = $this->mHistory->get_n();
        $data['off'] = $this->mHistory->get_o();
        $data['rep'] = $this->mHistory->get_r();
        $this->load->view('templates/vHeader', $data);
        $this->load->view('user/vIndex', $data);
        $this->load->view('templates/vFooter');
        // $email = $this->input->post('email');
        // $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // if ($user['role_id'] == 2) {
        //     redirect('cUser');
        // } else {
        //     redirect('cUser');
        // }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout ! 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('cLogin');
    }
    // public function edit()
    // {

    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     // redirect('cUseredit');
    //     // if ($this->form_validation->run() == false) {
    //     //     $data['tittle'] = 'Edit Profile';

    //     //     $this->load->view('vUseredit', $data);
    //     // }
    //     // $this->load->view('templates/vHeader');
    //     // $this->load->view('templates/vFooter');
    // }
}
