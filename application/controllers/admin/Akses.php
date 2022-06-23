<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
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
            'title' => 'Akses',
            // 'akses' => $this->core->get('tb_akses', ['select_by' => 'id_akses', 'order_by' => 'DESC']),
            'user' => $this->core->get('tb_user', ['select_by' => 'id_user', 'order_by' => 'DESC']),
            // 'akses_user' => $this->core->get('tb_akses_user', ['select_by' => 'id_akses_user', 'order_by' => 'DESC']),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/akses/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function setting($id)
    {
        // $this->form_validation->set_rules('akses_id', 'Akses', 'trim');

        // $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        // if ($this->form_validation->run() == false) {
        $data = [
            'title' => 'Tambah Akses',
            'akses' => $this->core->get('tb_akses', ['select_by' => 'id_akses', 'order_by' => 'DESC']),
            'akses_user' => $this->core->get('tb_akses_user', ['select_by' => 'id_akses_user', 'order_by' => 'DESC']),
            'user' => $this->core->select('tb_user', ['id_user' => $id]),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/akses/setting', $data);
        $this->load->view('layout/admin/footer');
        // } else {
        //     $input = implode(',', (array)$this->input->post('akses_id', true));
        //     $data = [
        //         'akses_id' => $input,
        //     ];

        //     echo json_encode($data);
        //     die;
        //     // $this->core->create('tb_akses_user', $data);
        //     $this->session->set_flashdata('message', '
        //     <div class="alert alert-success" role="alert">
        //         <div class="container text-center">
        //             <span class="badge badge-success">Berhasil</span> Akses berhasil ditambahkan.
        //         </div>
        //     </div>
        //     ');
        //     redirect('admin/akses');
        // }
    }

    public function proses_setting()
    {
        $id = $this->input->post('user_id');
        $akses_id = $this->input->post('akses_id', true);
        for ($i = 0; $i < count($akses_id); $i++) {
            $data = [
                'user_id' => $id,
                'akses_id' => $akses_id[$i],
            ];
            $this->core->create('tb_akses_user', $data);
        }
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Akses berhasil ditambahkan.
                </div>
            </div>
            ');
        redirect('admin/akses');
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
            redirect('admin/akses');
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
        redirect('admin/akses');
    }
}
