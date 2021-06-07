<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cChangepwd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('cLogin');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->library('form_validation');
            $data['tittle'] = 'Change Password';
            $this->load->view('templates/vHeaderLogin', $data);
            $this->load->view('vChangepwd');
            $this->load->view('templates/vFooterLogin');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password hass been changed. please login !</div>');
            redirect('cLogin');
        }
    }
}
