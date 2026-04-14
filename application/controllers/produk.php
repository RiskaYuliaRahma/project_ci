<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['produk'] = $this->Produk_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'id_kategori' => $this->input->post('id_kategori')
        ];

        $this->Produk_model->insert($data);
        redirect('produk');
    }

    public function hapus($id)
    {
        $this->Produk_model->delete($id);
        redirect('produk');
    }

    public function edit($id)
    {
        $data['produk'] = $this->Produk_model->get_by_id($id);
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'id_kategori' => $this->input->post('id_kategori')
        ];

        $this->Produk_model->update($id, $data);
        redirect('produk');
    }
}
?>