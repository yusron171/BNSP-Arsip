<?php

defined('BASEPATH') or exit('No direct script access allowed');

class arsip_model extends CI_Model
{
    public function getDataId($t, $w)
	{
		$this->db->join('kategori', 'kategori.id_kategori = ' . $t . '.id_kategori', 'left');
		$this->db->where($w);
		return $this->db->get($t);
	}
    public function getData($t)
	{
		return $this->db->get($t);
	}
    public function create($table, $data)
    {
        $this->db->insert($table, $data);
        return true;
    }
    public function ins($t, $object)
	{
		$this->db->insert($t, $object);
	}
    public function del($t, $w)
	{
		$this->db->delete($t, $w);
	}
    public function read($table, $where = null)
    {
        if ($where != null) {
            $this->db->join('kategori', 'kategori.id_kategori = ' . $table . '.id_kategori', 'left');
            $this->db->where($where);
        }
        return $this->db->get($table);
    }
    public function updData($t, $object, $w)
	{
		$this->db->update($t, $object, $w);
	}
    public function search($cari)
	{
		return $this->db->query("SELECT * FROM surat as b
		
		JOIN kategori as k on k.id_kategori = b.id_kategori
		WHERE b.id_surat LIKE '%" . $cari . "%' OR 
		b.judul LIKE '%" . $cari . "%' ");
	}

}