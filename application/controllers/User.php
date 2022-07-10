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
        $data = [
            'title' => 'Admin User',
            'user_login' => $this->core->select_user(['username_user' => $this->session->userdata('username')]),
            'user' => $this->core->get_all_user(['select_by' => 'id_user', 'order_by' => 'DESC']),
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/topbar');
        $this->load->view('user/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username_user', 'Username', 'trim|required');
        $this->form_validation->set_rules('password_user', 'Password', 'trim|required|matches[konfirmasi_password]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        $this->form_validation->set_rules('unit_id', 'Unit', 'trim|required');

        $this->form_validation->set_message('matches', '{field} tidak sama!.');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Tambah User',
                'unit' => $this->core->get_all_unit(),

            ];
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('layout/topbar');
            $this->load->view('user/tambah', $data);
            $this->load->view('layout/footer');
        } else {

            $data = [

                'nama_user' => $this->input->post('nama_user'),
                'username_user' => $this->input->post('username_user'),
                'password_user' => password_hash($this->input->post('password_user'), PASSWORD_DEFAULT),
                'status_user' =>  $this->input->post('status_user') != null ?  $this->input->post('status_user') : 'On',
                'role' => $this->input->post('role'),
                'unit_id' => $this->input->post('unit_id'),
            ];

            $input_avatar = $_FILES['avatar_user']['name'];
            if ($input_avatar != null) {
                $config['upload_path']          = './assets/img/avatar/';
                $config['allowed_types']        = 'jpeg|jpg|png|PNG|JPG|JPEG';
                $config['remove_spaces']        = 1;
                $config['max_size']             = 3072;
                $config['file_name']            = 'avatar' . '-' . date('ymd') . substr(str_shuffle(time()), 0, 6);

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('avatar_user')) {
                    $avatar = $this->upload->data('file_name');
                    $data['avatar_user'] = $avatar;
                }
            } else {
                $data['avatar_user'] = 'default.jpg';
            }
            $this->core->create('tb_user', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> User berhasil ditambahkan.
                </div>
            </div>
            ');
            redirect('user');
        }
    }

    public function ubah_status($id)
    {
        $data = ['status_user' => $this->input->post('status_user', true)];
        $this->core->update('tb_user', ['id_user' => $id], $data);
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> Status user berhasil diubah.
                </div>
            </div>
            ');
        redirect('user');
    }

    public function avatar($id)
    {
        $data = [
            'title' => 'Avatar User',
            'user' => $this->core->select_user(['id_user' => $id]),
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/topbar');
        $this->load->view('user/avatar', $data);
        $this->load->view('layout/footer');
    }

    public function ubah_avatar($id)
    {
        $input_avatar = $_FILES['avatar_user']['name'];
        if ($input_avatar) {
            $config['upload_path']          = './assets/img/avatar/';
            $config['allowed_types']        = 'jpeg|jpg|png|PNG|JPG|JPEG';
            $config['remove_spaces']        = 1;
            $config['max_size']             = 3072;
            $config['file_name']            = 'avatar' . '-' . date('ymd') . substr(str_shuffle(time()), 0, 6);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('avatar_user')) {
                $this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
					<div class="container text-center">
						<span class="badge badge-danger">Gagal</span> Gagal megnubah avatar! .
					</div>
				</div>
				');
                redirect('user');
            } else {
                $avatar_lama = $this->core->select_user(['username_user' => $this->session->userdata('username')]);
                if ($avatar_lama->avatar_user != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/avatar/' . $avatar_lama->avatar_user);
                }
                $avatar = $this->upload->data('file_name');
                $data = ['avatar_user' => $avatar];
                $this->core->update('tb_user', ['id_user' => $id], $data);
                $this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
					<div class="container text-center">
						<span class="badge badge-success">Berhasil</span> Avatar berhasil diubah! .
					</div>
				</div>
				');
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert">
				<div class="container text-center">
					<span class="badge badge-danger">Gagal</span> Gagal mengubah avatar! .
				</div>
			</div>
			');
            redirect('admin/profile');
        }
    }

    public function setting($id)
    {
        $data = [
            'title' => 'Setting',
            'user' => $this->core->select_user(['id_user' => $id]),
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/topbar');
        $this->load->view('/user/setting', $data);
        $this->load->view('layout/footer');
    }

    public function proses_setting($id)
    {
        $this->form_validation->set_rules('username_user', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Role', 'trim|required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Setting User',
                'user' => $this->core->select_user(['id_user' => $id]),
            ];
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('layout/topbar');
            $this->load->view('user/setting', $data);
            $this->load->view('layout/footer');
        } else {
            $data_user = $this->core->select_user(['id_user' => $id]);
            $data = [
                'nama_user' => $this->input->post('nama_user'),
                'role_id' => $this->input->post('role_id'),
            ];
            $input_username = strtolower($this->input->post('username_user'));
            if ($input_username !== $data_user->username_user) {
                $data['username_user'] = $input_username;
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    <div class="container text-center">
                        <span class="badge badge-danger">Gagal</span> Username harus berbeda dari sebelumnya.
                    </div>
                </div>
                ');
                redirect('user/setting/' . $data_user->id_user);
            }
            $this->core->update('tb_user', ['id_user' => $id], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> User berhasil disetting.
                </div>
            </div>
            ');
            redirect('user');
        }
    }

    public function ubah_password($id)
    {
        $this->form_validation->set_rules('password_user', 'Password', 'trim|required|matches[konfirmasi_password]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required');

        $this->form_validation->set_message('matches', '{field} tidak sama!.');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong!.');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', validation_errors(
                '
            <div class="alert alert-danger m-0" role="alert">
				<div class="container text-center">
					<span class="badge badge-danger">Gagal</span> ',
                '</div>
			</div>
            '
            ));
            redirect('user');
        } else {
            $data = [
                'password_user' => password_hash($this->input->post('password_user', true), PASSWORD_DEFAULT)
            ];
            $this->core->update('tb_user', ['id_user' => $id], $data);
            $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    <div class="container text-center">
                        <span class="badge badge-success">Berhasil</span> Password user berhasil diubah.
                    </div>
                </div>
                ');
            redirect('user');
        }
    }
}
