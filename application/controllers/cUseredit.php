<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUseredit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['tittle'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/vHeader', $data);
            $this->load->view('user/vEdit', $data);
            $this->load->view('templates/vFooter');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //upload file
            $image = ''; // deklarasi tok
            if ($_FILES['image']['name']) { //iki lek wong e upload file
                $dir = 'assets/img/profile/'; // jeneng direktori gae nyimpen file e
                $config['upload_path']          = $dir; //podo
                $config['allowed_types']        = 'jpg|png'; //brarti lek misal wonge upload format .doc iso lak an? iso
                $config['file_name']           = md5('hasmikontol') . rand(1000, 100000); // jeneng file
                $this->load->library('upload', $config); //load library upload e
                if (!$this->upload->do_upload('image')) { // lek upload file e gagal
                    //isi en sakkarepmu
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your updated didn success !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('cUseredit');
                } else { // le upload file e berhasil
                    $file = $this->upload->data(); //njukuk parameter file seng wes berhasil diupload
                    $image = $file['file_name']; // jeneng file seng wes berhasil diupload
                    $old_image = $data['user']['image'];
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                }
            }

            if ($image) { //lek variabel e onok isine
                $this->db->set('image', $image); // update gambare
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('cUser');
        }
        // $data['tittle'] = 'Edit Profile';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // // $this->load->view('templates/vHeader');
        // $this->load->view('vUseredit', $data);
        // // $this->load->view('templates/vFooter');
    }
}
