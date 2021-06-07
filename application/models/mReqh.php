<?php

class MReqh extends CI_Model
{
    function get_relasi()
    {
        $name = "Ready";
        $this->db->select(['b.id', 'b.item', 'a.id_hard', 'a.type', 'a.total', 'a.con_id']);
        $this->db->from('hardware a');
        $this->db->join('itemh b', 'a.item_id = b.id', 'inner');
        $this->db->where('a.con_id', $name);
        $this->db->order_by('id_hard', 'asc');
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
