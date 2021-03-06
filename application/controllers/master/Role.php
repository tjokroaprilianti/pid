<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Core_Model', 'core');
    }

    public function index()
    {
        $data = [
            'title' => 'Master Role',
            'list_role' => $this->core->get('tb_role', ['select_by' => 'id_role', 'order_by' => 'DESC']),
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/topbar');
        $this->load->view('master/role/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_role', 'Role', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Tambah Role',
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('layout/topbar');
            $this->load->view('master/role/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_role' => $this->input->post('nama_role'),
            ];
            $this->core->create('tb_role', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Role berhasil ditambahkan.
                </div>
            </div>
            ');
            redirect('master/role');
        }
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Master Ubah Role',
            'data_role' => $this->core->select('tb_role', ['id_role' => $id])
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/topbar');
        $this->load->view('master/role/ubah', $data);
        $this->load->view('layout/footer');
    }

    public function proses_ubah($id)
    {
        $this->form_validation->set_rules('nama_role', 'Role', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Master Ubah Role',
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('layout/topbar');
            $this->load->view('master/role/ubah', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_role' => $this->input->post('nama_role'),
            ];
            $this->core->update('tb_role', ['id_role' => $id], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Role berhasil diubah.
                </div>
            </div>
            ');
            redirect('master/role');
        }
    }

    public function hapus($id)
    {
        $this->core->delete('tb_role', ['param' => 'id_role', 'id' => $id]);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success" role="alert">
            <div class="container text-center">
                <span class="badge badge-success">Berhasil</span> Role berhasil dihapus.
            </div>
        </div>
        ');
        redirect('master/role');
    }
}
