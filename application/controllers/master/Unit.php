<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Core_Model', 'core');
    }

    public function index()
    {
        $data = [
            'title' => 'Master Unit',
            'unit' => $this->core->get('tb_unit', ['select_by' => 'id_unit', 'order_by' => 'DESC']),
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/topbar');
        $this->load->view('master/unit/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_unit', 'unit', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Tambah Unit',
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('layout/topbar');
            $this->load->view('master/unit/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_unit' => $this->input->post('nama_unit'),
            ];
            $this->core->create('tb_unit', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" unit="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Unit berhasil ditambahkan.
                </div>
            </div>
            ');
            redirect('master/unit');
        }
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Master Ubah Unit',
            'unit' => $this->core->select('tb_unit', ['id_unit' => $id])
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/topbar');
        $this->load->view('master/unit/ubah', $data);
        $this->load->view('layout/footer');
    }

    public function proses_ubah($id)
    {
        $this->form_validation->set_rules('nama_unit', 'unit', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Ubah unit',
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('layout/topbar');
            $this->load->view('master/unit/ubah', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_unit' => $this->input->post('nama_unit'),
            ];
            $this->core->update('tb_unit', ['id_unit' => $id], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" unit="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> unit berhasil diubah.
                </div>
            </div>
            ');
            redirect('master/unit');
        }
    }

    public function hapus($id)
    {
        $this->core->delete('tb_unit', ['param' => 'id_unit', 'id' => $id]);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success" unit="alert">
            <div class="container text-center">
                <span class="badge badge-success">Berhasil</span> unit berhasil dihapus.
            </div>
        </div>
        ');
        redirect('master/unit');
    }
}
