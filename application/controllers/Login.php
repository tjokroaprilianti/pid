<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username_user', 'Username', 'trim|required');
		$this->form_validation->set_rules('password_user', 'Password', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!.');

		if ($this->form_validation->run() == false) {
			$this->load->view('login/index');
		} else {
			$username = $this->input->post('username_user');
			$password = $this->input->post('password_user');
			$user = $this->db->get_where('tb_user', ['username_user' => $username])->row();

			if ($user) {
				// if (password_verify($password, $user->password_user)) {
				if ($password === $user->password_user) {
					$newdata = [
						'nama'  => $user->nama_user,
						'email' => $user->email_user,
						'nip' => $user->nip_user,
						'id' => $user->id_user,
						'login' => 1,
					];
					// $this->session->set_userdata($newdata);

					$this->session->set_flashdata('message', '
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<div class="container text-center">
							<span class="badge badge-success">Success</span> Login successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					');
					redirect('admin/dashboard');
				} else {
					$this->session->set_flashdata('message', '
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<div class="container text-center">
							<span class="badge badge-danger">Failed</span> Please check your username and password!.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<div class="container text-center">
							<span class="badge badge-danger">Failed</span> Please check your username and password!.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					');
				redirect('login');
			}
		}
	}
}
