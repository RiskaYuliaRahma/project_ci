<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('Kategori_model');
        if (!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['buku'] = $this->Buku_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'kode_buku' => $this->input->post('kode_buku'),
            'judul_buku' => $this->input->post('judul_buku'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun' => $this->input->post('tahun'),
            'id_kategori' => $this->input->post('id_kategori'),
            'stok' => $this->input->post('stok'),
            'lokasi_rak' => $this->input->post('lokasi_rak') 
        ];

        $this->Buku_model->insert($data);
        redirect('buku');
    }

    public function hapus($id)
    {
        $this->Buku_model->delete($id);
        redirect('buku');
    }

    public function edit($id)
    {
        $data['buku'] = $this->Buku_model->get_by_id($id);
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'kode_buku' => $this->input->post('kode_buku'),
            'judul_buku' => $this->input->post('judul_buku'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun' => $this->input->post('tahun'),
            'id_kategori' => $this->input->post('id_kategori'),
            'stok' => $this->input->post('stok'),
            'lokasi_rak' => $this->input->post('lokasi_rak') 
        ];

        $this->Buku_model->update($id, $data);
        redirect('buku');
    }

    public function cetak_buku()
    {
        $this->db->select('*');
        $this->db->from('buku');

        $data['data'] = $this->db->get()->result();

        $this->load->view('laporan/cetak_buku', $data);
    }

}
?>