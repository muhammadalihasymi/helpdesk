<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('cUser');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Login Page';
            $this->load->view('templates/vHeaderLogin', $data);
            $this->load->view('vLogin');
            $this->load->view('templates/vFooterLogin');
        } else {
            //success validation
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //if user exist
        if ($user) {
            //if user active
            if ($user['is_active'] == 1) {
                //check passwd
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('cAdmin');
                    } else {
                        redirect('cUser');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password ! </div>');
                    redirect('cLogin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email has not been activated !</div>');
                redirect('cLogin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered !</div>');
            redirect('cLogin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout !</div>');
        redirect('cLogin');
    }
    public function block()
    {
        echo 'blocked';
    }
    // public function forgotPwd()
    // {
    //     $data['tittle'] = 'Forgot Password';
    //     $this->load->view('templates/vHeaderLogin', $data);
    //     $this->load->view('vLogin');
    //     $this->load->view('templates/vFooterLogin');
    // }
}
