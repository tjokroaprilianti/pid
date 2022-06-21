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
            'user_login' => $this->core->select('tb_user', ['username_user' => $this->session->userdata('username')]),
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
                'username_user' => strtolower($this->input->post('username_user')),
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

    public function setting($id)
    {
        $data = [
            'title' => 'Setting User',
            'user' => $this->core->select('tb_user', ['id_user' => $id]),
            'role' => $this->core->get('tb_role'),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/user/setting', $data);
        $this->load->view('layout/admin/footer');
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
                'user' => $this->core->select('tb_user', ['id_user' => $id]),
                'role' => $this->core->get('tb_role'),
            ];
            $this->load->view('layout/admin/header', $data);
            $this->load->view('layout/admin/sidebar');
            $this->load->view('layout/admin/topbar');
            $this->load->view('admin/user/setting', $data);
            $this->load->view('layout/admin/footer');
        } else {
            $data_user = $this->core->select('tb_user', ['id_user' => $id]);
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
                redirect('admin/user/setting/' . $data_user->id_user);
            }
            $this->core->update('tb_user', ['id_user' => $id], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                <div class="container text-center">
                    <span class="badge badge-success">Berhasil</span> User berhasil disetting.
                </div>
            </div>
            ');
            redirect('admin/user');
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
        redirect('admin/user');
    }

    public function avatar($id)
    {
        $data = [
            'title' => 'Setting Avatar User',
            'user' => $this->core->select('tb_user', ['id_user' => $id]),
        ];
        $this->load->view('layout/admin/header', $data);
        $this->load->view('layout/admin/sidebar');
        $this->load->view('layout/admin/topbar');
        $this->load->view('admin/user/avatar', $data);
        $this->load->view('layout/admin/footer');
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
                redirect('admin/profile');
            } else {
                $avatar_lama = $this->core->select('tb_user', ['username_user' => $this->session->userdata('username')]);
                if ($avatar_lama->avatar_user != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/avatar/' . $avatar_lama->avatar_user);
                }
                $avatar = $this->upload->data('file_name');
                $data = ['avatar_user' => $avatar];
                $this->session->set_userdata('avatar', $avatar);
                $this->core->update('tb_user', ['id_user' => $id], $data);
                $this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
					<div class="container text-center">
						<span class="badge badge-success">Berhasil</span> Avatar berhasil diubah! .
					</div>
				</div>
				');
                redirect('admin/user');
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
            redirect('admin/user');
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
            redirect('admin/user');
        }
    }

    // public function hapus($id)
    // {
    //     $this->core->delete('tb_cost_center', ['param' => 'id_cost_center', 'id' => $id]);
    //     $this->session->set_flashdata('message', '
    //     <div class="alert alert-success" role="alert">
    //         <div class="container text-center">
    //             <span class="badge badge-success">Berhasil</span> Cost center berhasil dihapus.
    //         </div>
    //     </div>
    //     ');
    //     redirect('admin/master/cost/center');
    // }
}
