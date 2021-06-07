<?php

class MUser extends CI_Model
{
    public function get_relasi()
    {
        $this->db->select(['r.id', 'r.role', 'u.id', 'u.name', 'u.email']);
        $this->db->from('user u');
        $this->db->join('user_role r', 'u.role_id = r.id', 'inner');
        $this->db->order_by('name', 'asc');
        $return = $this->db->get('');
        return $return->result();
    }
    public function get_role()
    {
        return $this->db->get('user_role');
    }
    public function get_user()
    {
        return $this->db->get('user');
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
