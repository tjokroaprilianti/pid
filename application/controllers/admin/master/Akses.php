<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Core_Model', 'core');
    }

    public function index()
    {
        $data = [
            'title' => 'Master Akses',
            'list_akses' => $this->core->get('tb_akses', ['select_by' => 'id_akses', 'order_by' => 'DESC']),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/akses/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_akses', 'Akses', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Tambah Akses',
            ];
            $this->load->view('layout/admin/header', $data);
            $this->load->view('layout/admin/sidebar');
            $this->load->view('layout/admin/topbar');
            $this->load->view('admin/akses/tambah', $data);
            $this->load->view('layout/admin/footer');
        } else {
            $data = [
                'nama_akses' => $this->input->post('nama_akses'),
            ];
            $this->core->create('tb_akses', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Akses berhasil ditambahkan.
                </div>
            </div>
            ');
            redirect('admin/master/akses');
        }
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Master Ubah Akses',
            'data_akses' => $this->core->select('tb_akses', ['id_akses' => $id])
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/akses/ubah', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_ubah($id)
    {
        $this->form_validation->set_rules('nama_akses', 'Akses', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Ubah Akses',
            ];
            $this->load->view('layout/admin/header', $data);
            $this->load->view('layout/admin/sidebar');
            $this->load->view('layout/admin/topbar');
            $this->load->view('admin/akses/ubah', $data);
            $this->load->view('layout/admin/footer');
        } else {
            $data = [
                'nama_akses' => $this->input->post('nama_akses'),
            ];
            $this->core->update('tb_akses', ['id_akses' => $id], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Akses berhasil diubah.
                </div>
            </div>
            ');
            redirect('admin/master/akses');
        }
    }

    public function hapus($id)
    {
        $this->core->delete('tb_akses', ['param' => 'id_akses', 'id' => $id]);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success" role="alert">
            <div class="container text-center">
                <span class="badge badge-success">Berhasil</span> Akses berhasil dihapus.
            </div>
        </div>
        ');
        redirect('admin/master/akses');
    }
}
