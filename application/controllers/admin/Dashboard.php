<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => 'Admin Dashboard',
		];
		$this->load->view('layout/admin/header', $data);
		$this->load->view('layout/admin/sidebar');
		$this->load->view('layout/admin/topbar');
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('layout/admin/footer');
	}
}
