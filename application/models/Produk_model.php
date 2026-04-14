<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model{
    
    private $table = 'tbl_produk';

    public function get_all()
    {
        $this->db->select('tbl_produk.*, kategori.nama_kategori');
        $this->db->from('tbl_produk');
        $this->db->join('kategori', 'kategori.id = tbl_produk.id_kategori');

        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_produk' => $id]);
    }

    public function update($id, $data)
    {
        $this->db->where('id_produk', $id);
        return $this->db->update($this->table, $data);
    }
}
?>