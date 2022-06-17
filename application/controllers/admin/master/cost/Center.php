<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Center extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Core_Model', 'core');
    }

    public function index()
    {
        $data = [
            'title' => 'Master Cost Center',
            'list_cost_center' => $this->core->get('tb_cost_center', ['select_by' => 'id_cost_center', 'order_by' => 'ASC']),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/cost/center/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kode_cost_center', 'Kode Cost Center', 'trim|required');
        $this->form_validation->set_rules('nama_cost_center', 'Nama Cost Center', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Tambah Cost Center',
            ];
            $this->load->view('layout/admin/header', $data);
            $this->load->view('layout/admin/sidebar');
            $this->load->view('layout/admin/topbar');
            $this->load->view('admin/cost/center/tambah', $data);
            $this->load->view('layout/admin/footer');
        } else {
            $data = [
                'kode_cost_center' => $this->input->post('kode_cost_center'),
                'nama_cost_center' => $this->input->post('nama_cost_center'),
            ];
            $this->core->create('tb_cost_center', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Cost center berhasil ditambahkan.
                </div>
            </div>
            ');
            redirect('admin/master/cost/center');
        }
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Master Ubah Cost Center',
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
                'nama_askes' => $this->input->post('nama_askes'),
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
