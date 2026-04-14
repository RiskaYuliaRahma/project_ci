<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model{
    
    private $table = 'buku';

    public function get_all()
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'kategori.id = buku.id_kategori', 'left');

        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'kategori.id = buku.id_kategori', 'left');
        $this->db->where('buku.id', $id);

        return $this->db->get()->row();
    }

    public function insert($data)
    {
        // validasi sederhana
        if(empty($data['judul_buku'])){
            return false;
        }

        if(!isset($data['lokasi_rak'])){
            $data['lokasi_rak'] = null;
        }

        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function update($id, $data)
    {
        // validasi sederhana
        if(empty($data['judul_buku'])){
            return false;
        }

        // pastikan lokasi_rak tetap ada
        if(!isset($data['lokasi_rak'])){
            $data['lokasi_rak'] = null;
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}
?>