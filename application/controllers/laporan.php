<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan = $this->input->post('bulan');

        $this->db->select('peminjaman.*, anggota.nama_anggota');

        $this->db->from('peminjaman');

        $this->db->join(
            'anggota',
            'anggota.id = peminjaman.anggota_id'
        );

        if(!empty($bulan)){

            $this->db->where(
                'DATE_FORMAT(tanggal_pinjam, "%Y-%m") =',
                $bulan
            );

        }

        $data['data'] = $this->db->get()->result();

        $data['bulan'] = $bulan;

        $this->load->view('laporan/cetak_pinjam', $data);
    }

    public function buku()
    {
        $keyword = $this->input->get('keyword');

        $this->db->select('*');

        $this->db->from('buku');

        if($keyword){
            $this->db->like('judul_buku', $keyword);
        }

        $data['data'] = $this->db->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman_buku', $data);
        $this->load->view('templates/footer');
    }

}