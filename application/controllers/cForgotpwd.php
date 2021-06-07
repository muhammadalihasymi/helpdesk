<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cForgotpwd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->library('form_validation');
            $data['tittle'] = 'Forgot Password';
            $this->load->view('templates/vHeaderLogin', $data);
            $this->load->view('vForgotpwd');
            $this->load->view('templates/vFooterLogin');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = bin2hex(openssl_random_pseudo_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password !</div>');
                redirect('cForgotpwd');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not register or activated !</div>');
                redirect('cForgotpwd');
            }
        }
    }
    private function _sendEmail($token, $type)
    {
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'tempebacem061099@gmail.com',
        //     'smtp_pass' => 'juangkrek909',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"

        // ];

        // $this->load->library('email', $config);
        $this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'tempebacem061099@gmail.com';
        $config['smtp_pass'] = 'juangkrek909';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");
        $this->email->from('tempebacem061099@gmail.com', 'Admin IT 24slides');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'cForgotpwd/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'cForgotpwd/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->db->set('is_active', 1);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->db->delete('user_token', ['email' => $email]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated. Pleaase Login.</div>');
                redirect('cLogin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed, Token invalid !</div>');
                redirect('cLogin');
            }
        } else { //jika email tidak ada di database
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed, Wrong Email !</div>');
            redirect('cLogin');
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->db->delete('user_token', ['email' => $email]);

                $this->session->set_userdata('reset_email', $email);
                redirect('cChangepwd');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed, Token invalid !</div>');
                redirect('cLogin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed, Wrong Email !</div>');
            redirect('cLogin');
        }
    }

    public function changePassword()
    {
        $this->load->library('form_validation');
        $data['tittle'] = 'Change Password';
        $this->load->view('templates/vHeaderLogin', $data);
        $this->load->view('vChangepwd');
        $this->load->view('templates/vFooterLogin');
    }
}
