<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

	public function index()
	{
		$array_items = array('username', 'login', 'nama', 'avatar');
		$this->session->unset_userdata($array_items);
		$this->session->set_flashdata('message', '
		<div class="alert alert-success" role="alert">
			<div class="container text-center">
				<span class="badge badge-success">Berhasil</span> Logout berhasil.
			</div>
		</div>
		');
		redirect('login');
	}
}
