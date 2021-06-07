<?php

class MHistory extends CI_Model
{
    function get_h()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select(['h.id', 'h.email', 'h.item', 'h.status',]);
        $this->db->from('reqh h');
        $this->db->where('h.email', $user['email']);
        $return = $this->db->get('');
        return $return;
        // $this->db->insert('reqh', $return);
    }
    function get_s()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select(['h.id', 'h.email', 'h.soft', 'h.status',]);
        $this->db->from('reqs h');
        $this->db->where('h.email', $user['email']);
        $return = $this->db->get('');
        return $return;
        // $this->db->insert('reqh', $return);
    }
    function get_n()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select(['h.id', 'h.email', 'h.exp', 'h.status',]);
        $this->db->from('reqn h');
        $this->db->where('h.email', $user['email']);
        $return = $this->db->get('');
        return $return;
        // $this->db->insert('reqh', $return);
    }
    function get_o()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select(['h.id', 'h.email', 'h.exp', 'h.status',]);
        $this->db->from('reqo h');
        $this->db->where('h.email', $user['email']);
        $return = $this->db->get('');
        return $return;
        // $this->db->insert('reqh', $return);
    }
    function get_r()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select(['h.id', 'h.email', 'h.exp', 'h.status',]);
        $this->db->from('reqr h');
        $this->db->where('h.email', $user['email']);
        $return = $this->db->get('');
        return $return;
        // $this->db->insert('reqh', $return);
    }
    function get_hard()
    {
        return $this->db->get('hardware');
    }
    function get_req()
    {
        return $this->db->get('reqh');
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
