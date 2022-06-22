<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_belum_login();
		cek_admin();
		$this->load->model('Core_Model', 'core');
	}

	public function index()
	{
		$data = [
			'title' => 'Profile',
			'user' => $this->core->select('tb_user', ['username_user' => $this->session->userdata('username')]),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/topbar', $data);
		$this->load->view('profile/index', $data);
		$this->load->view('layout/footer');
	}

	public function avatar()
	{
		cek_belum_login();
		$data = [
			'title' => 'Profile Avatar',
			'user' => $this->core->select('tb_user', ['username_user' => $this->session->userdata('username')]),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/topbar');
		$this->load->view('profile/avatar', $data);
		$this->load->view('layout/footer');
	}

	public function hapus_avatar($id)
	{
		$avatar_lama = $this->core->select('tb_user', ['username_user' => $this->session->userdata('username')]);
		if ($avatar_lama->avatar_user != 'default.jpg') {
			unlink(FCPATH . 'assets/img/avatar/' . $avatar_lama->avatar_user);
			$data = ['avatar_user' => 'default.jpg'];
			$this->session->set_userdata('avatar', 'default.jpg');
			$this->core->update('tb_user', ['id_user' => $id], $data);
			$this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">
				<div class="container text-center">
					<span class="badge badge-success">Berhasil</span> Avatar berhasil dihapus.
				</div>
			</div>
			');
			redirect('profile');
		} else {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert">
				<div class="container text-center">
					<span class="badge badge-danger">Gagal</span> Gagal meghapus, avatar saat ini default! .
				</div>
			</div>
			');
			redirect('profile');
		}
	}

	public function ubah_avatar()
	{
		$id = $this->input->post('id');
		$input_avatar = $_FILES['avatar_user']['name'];
		if ($input_avatar) {
			$config['upload_path']          = './assets/img/avatar/';
			$config['allowed_types']        = 'jpeg|jpg|png|PNG|JPG|JPEG';
			$config['remove_spaces']        = 1;
			$config['max_size']             = 2548;
			$config['file_name'] 			= 'avatar' . '-' . date('ymd') . substr(str_shuffle(time()), 0, 6);

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('avatar_user')) {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
					<div class="container text-center">
						<span class="badge badge-danger">Gagal</span> Gagal megnubah avatar! .
					</div>
				</div>
				');
				redirect('profile');
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
				redirect('profile');
			}
		} else {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert">
				<div class="container text-center">
					<span class="badge badge-danger">Gagal</span> Gagal mengubah avatar! .
				</div>
			</div>
			');
			redirect('profile');
		}
	}

	public function setting($id)
	{
		$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username_user', 'Username', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!.');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors(
				'<div class="alert alert-danger m-0" role="alert">
				<div class="container text-center">
					<span class="badge badge-danger">Gagal</span> ',
				'</div>
			</div>'
			));
			redirect('profile');
		} else {
			$nama = $this->input->post('nama_user');
			$username = $this->input->post('username_user');

			$data = [
				'nama_user' => $nama,
				'username_user' => $username,
			];
			$this->core->update('tb_user', ['id_user' => $id], $data);
			$newdata = [
				'nama'  => $this->input->post('nama_user'),
				'username' => $this->input->post('username_user'),
			];
			$this->session->set_userdata($newdata);
			$pesan = '<div class="alert alert-success" role="alert">
						<div class="container text-center">
							<span class="badge badge-success">Berhasil</span> Berhasil ubah nama <i class="text-primary">' . $nama . ',</i> dan username <i class="text-primary">' . $username . '</i>
						</div>
					</div>';
			$this->session->set_flashdata('message', $pesan);
			redirect('profile');
		}
	}

	public function reset_password($id)
	{
		$this->form_validation->set_rules('password_user', 'Password', 'trim|required|matches[konfirmasi_password]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
		$this->form_validation->set_message('matches', '{field} tidak sama!.');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors(
				'<div class="alert alert-danger m-0" role="alert">
				<div class="container text-center">
					<span class="badge badge-danger">Gagal</span> ',
				'</div>
			</div>'
			));
			redirect('profile');
		} else {
			$data = [
				'password_user' => password_hash($this->input->post('password_user'), PASSWORD_DEFAULT),
			];
			$this->core->update('tb_user', ['id_user' => $id], $data);
			$this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">
				<div class="container text-center">
					<span class="badge badge-success">Berhasil</span> Password berhasil diubah! .
				</div>
			</div>
			');
			redirect('profile');
		}
	}
}
