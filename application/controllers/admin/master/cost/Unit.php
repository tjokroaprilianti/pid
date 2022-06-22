<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        cek_bukan_admin();
        $this->load->model('Core_Model', 'core');
    }

    public function index()
    {
        $data = [
            'title' => 'Master Cost Unit',
            'list_cost_unit' => $this->core->get('tb_cost_unit', ['select_by' => 'id_cost_unit', 'order_by' => 'ASC']),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/cost/unit/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kode_cost_unit', 'Kode Cost Unit', 'trim|required');
        $this->form_validation->set_rules('nama_cost_unit', 'Nama Cost Unit', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Tambah Cost Unit',
            ];
            $this->load->view('layout/admin/header', $data);
            $this->load->view('layout/admin/sidebar');
            $this->load->view('layout/admin/topbar');
            $this->load->view('admin/cost/unit/tambah', $data);
            $this->load->view('layout/admin/footer');
        } else {
            $data = [
                'kode_cost_unit' => $this->input->post('kode_cost_unit'),
                'nama_cost_unit' => $this->input->post('nama_cost_unit'),
            ];
            $this->core->create('tb_cost_unit', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Cost unit berhasil ditambahkan.
                </div>
            </div>
            ');
            redirect('admin/master/cost/unit');
        }
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Master Ubah Cost Center',
            'data_cost_unit' => $this->core->select('tb_cost_unit', ['id_cost_unit' => $id])
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/cost/unit/ubah', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_ubah($id)
    {
        $this->form_validation->set_rules('kode_cost_unit', 'Kode Cost Center', 'trim|required');
        $this->form_validation->set_rules('nama_cost_unit', 'Nama Cost Center', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Ubah Cost Center',
                'data_cost_unit' => $this->core->select('tb_cost_unit', ['id_cost_unit' => $id])
            ];
            $this->load->view('layout/admin/header', $data);
            $this->load->view('layout/admin/sidebar');
            $this->load->view('layout/admin/topbar');
            $this->load->view('admin/cost/unit/ubah', $data);
            $this->load->view('layout/admin/footer');
        } else {
            $data = [
                'kode_cost_unit' => $this->input->post('kode_cost_unit'),
                'nama_cost_unit' => $this->input->post('nama_cost_unit'),
            ];
            $this->core->update('tb_cost_unit', ['id_cost_unit' => $id], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Cost unit berhasil diubah.
                </div>
            </div>
            ');
            redirect('admin/master/cost/unit');
        }
    }

    public function hapus($id)
    {
        $this->core->delete('tb_cost_unit', ['param' => 'id_cost_unit', 'id' => $id]);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success" role="alert">
            <div class="container text-center">
                <span class="badge badge-success">Berhasil</span> Cost unit berhasil dihapus.
            </div>
        </div>
        ');
        redirect('admin/master/cost/unit');
    }
}
