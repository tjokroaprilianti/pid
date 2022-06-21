<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('login') != null) {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert">
				<div class="container text-center">
					<span class="badge badge-danger">Ditolak</span> Akses ditolak!.
				</div>
			</div>
			');
			redirect('dashboard');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		cek_sudah_login();
		$this->form_validation->set_rules('username_user', 'Username', 'trim|required');
		$this->form_validation->set_rules('password_user', 'Password', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!.');

		if ($this->form_validation->run() == false) {
			$data = [
				'title' => 'Login',
			];
			$this->load->view('login/index', $data);
		} else {
			$username = $this->input->post('username_user');
			$password = $this->input->post('password_user');
			$user = $this->db->get_where('tb_user', ['username_user' => $username])->row();

			if ($user) {
				if (password_verify($password, $user->password_user)) {
					if ($user->status_user == 'On') {
						if ($user->role_id == 1) {
							$newdata = [
								'username'  => $user->username_user,
								'nama'  => $user->nama_user,
								'avatar'  => $user->avatar_user,
								'login' => 1,
							];
							$pesan = '
							<div class="alert alert-success" role="alert">
								<div class="container text-center">
									<span class="badge badge-success">Berhasil</span> Selamat datang admin ' . $user->nama_user . '.
								</div>
							</div>
							';
							$this->session->set_userdata($newdata);
							$this->session->set_flashdata('message', $pesan);
							redirect('admin/dashboard');
						} else {
							$newdata = [
								'username'  => $user->username_user,
								'nama'  => $user->nama_user,
								'avatar'  => $user->avatar_user,
								'login' => 1,
							];
							$pesan = '
							<div class="alert alert-success" role="alert">
								<div class="container text-center">
									<span class="badge badge-success">Berhasil</span> Selamat datang ' . $user->nama_user . '.
								</div>
							</div>
							';
							$this->session->set_userdata($newdata);
							$this->session->set_flashdata('message', $pesan);
							redirect('dashboard');
						}
					} else {
						$this->session->set_flashdata('message', '
						<div class="alert alert-danger" role="alert">
							<div class="container text-center">
								<span class="badge badge-danger">Gagal</span> Akun tidak aktif, harap hubungi admin!.
							</div>
						</div>
						');
						redirect('login');
					}
				} else {
					$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
						<div class="container text-center">
							<span class="badge badge-danger">Gagal</span> Harap periksa kembali username dan password anda!.
						</div>
					</div>
					');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
					<div class="container text-center">
						<span class="badge badge-danger">Failed</span> Harap periksa kembali username dan password anda!.
					</div>
				</div>
					');
				redirect('login');
			}
		}
	}
}
