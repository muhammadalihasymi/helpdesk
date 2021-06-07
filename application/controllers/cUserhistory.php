<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUserhystory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mHistory');
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
        $data['hard'] = $this->mHistory->get_h();
        $data['soft'] = $this->mHistory->get_s();
        $data['net'] = $this->mHistory->get_n();
        $data['off'] = $this->mHistory->get_o();
        $data['rep'] = $this->mHistory->get_r();
        $this->load->view('templates/vHeader', $data);
        $this->load->view('user', $data);
        $this->load->view('templates/vFooter');
    }
}
