<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		cek_belum_login();
		$data = [
			'title' => 'Dashboard',
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/topbar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('layout/footer');
	}
}
