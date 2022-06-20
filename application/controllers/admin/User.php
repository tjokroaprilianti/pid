<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Core_Model', 'core');
    }

    public function index()
    {
        $join = [
            'join' => 'tb_role', 'referensi' => 'tb_role.id_role = tb_user.role_id',
        ];
        $data = [
            'title' => 'Admin User',
            'user' => $this->core->get_join_1tb('tb_user', $join, ['select_by' => 'id_user', 'order_by' => 'ASC']),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/user/index', $data);
        $this->load->view('layout/admin/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username_user', 'Username', 'trim|required');
        $this->form_validation->set_rules('password_user', 'Password', 'trim|required|matches[konfirmasi_password]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Role', 'trim|required');

        $this->form_validation->set_message('matches', '{field} tidak sama!.');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Admin Tambah User',
                'role' => $this->core->get('tb_role'),
            ];
            $this->load->view('layout/admin/header', $data);
            $this->load->view('layout/admin/sidebar');
            $this->load->view('layout/admin/topbar');
            $this->load->view('admin/user/tambah', $data);
            $this->load->view('layout/admin/footer');
        } else {
            $data = [
                'nama_user' => $this->input->post('nama_user'),
                'username_user' => $this->input->post('username_user'),
                'password_user' => password_hash($this->input->post('password_user'), PASSWORD_DEFAULT),
                'status_user' =>  $this->input->post('status_user') != null ?  $this->input->post('status_user') : 'On',
                'avatar_user' =>  'default.jpg',
                'role_id' => $this->input->post('role_id'),
            ];
            $this->core->create('tb_user', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> User berhasil ditambahkan.
                </div>
            </div>
            ');
            redirect('admin/user');
        }
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Setting Ubah Role User',
            'data_role_user' => $this->core->select('tb_role_user', ['id_role_user' => $id]),
            'user' => $this->core->get('tb_user'),
            'role' => $this->core->get('tb_role'),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/role_user/ubah', $data);
        $this->load->view('layout/admin/footer');
    }

    public function proses_ubah($id)
    {
        $this->form_validation->set_rules('role_id', 'Nama Role', 'trim|required');
        $this->form_validation->set_rules('user_id', 'Nama User', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Setting Ubah Role User',
                'data_cost_center' => $this->core->select('tb_cost_center', ['id_cost_center' => $id])
            ];
            $this->load->view('layout/admin/header', $data);
            $this->load->view('layout/admin/sidebar');
            $this->load->view('layout/admin/topbar');
            $this->load->view('admin/cost/center/ubah', $data);
            $this->load->view('layout/admin/footer');
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'role_id' => $this->input->post('role_id'),
            ];
            $this->core->update('tb_role_user', ['id_role_user' => $id], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Role user berhasil diubah.
                </div>
            </div>
            ');
            redirect('admin/setting/role/user');
        }
    }

    public function hapus($id)
    {
        $this->core->delete('tb_cost_center', ['param' => 'id_cost_center', 'id' => $id]);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success" role="alert">
            <div class="container text-center">
                <span class="badge badge-success">Berhasil</span> Cost center berhasil dihapus.
            </div>
        </div>
        ');
        redirect('admin/master/cost/center');
    }
}
