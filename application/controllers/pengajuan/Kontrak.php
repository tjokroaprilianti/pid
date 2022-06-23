<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
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
		cek_belum_login();
		$join1 = [
			'join1' => 'tb_cost_unit', 'referensi1' => 'tb_cost_unit.id_cost_unit = tb_pengajuan.cost_unit_id',
			'join2' => 'tb_cost_center', 'referensi2' => 'tb_cost_center.id_cost_center = tb_pengajuan.cost_center_id',
		];
		$data = [
			'title' => 'Pengajuan Kontrak',
			'pengajuan' => $this->core->get_join_2tb('tb_pengajuan', $join1, ['select_by' => 'id_pengajuan', 'order_by' => 'ASC']),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/topbar');
		$this->load->view('pengajuan/kontrak/index', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		cek_belum_login();
		$this->form_validation->set_rules('cost_center_id', 'Cost Center', 'trim|required');
		$this->form_validation->set_rules('user_id', 'Cost Unit', 'trim|required');
		$this->form_validation->set_rules('tanggal_invoice_pengajuan', 'Tanggal Invoice Pengajuan', 'trim|required');
		$this->form_validation->set_rules('vendor_pengajuan', 'Vendor Pengajuan', 'trim|required');
		$this->form_validation->set_rules('proyek_pengajuan', 'Proyek Pengajuan', 'trim|required');
		$this->form_validation->set_rules('alamat_vendor_pengajuan', 'Alamat Vendor Pengajuan', 'trim|required');
		$this->form_validation->set_rules('vet_pajak_pengajuan', 'VET Pajak Pengajuan', 'trim|required');
		$this->form_validation->set_rules('dpp_pajak_pengajuan', 'DPP Pajak Pengajuan', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
		if ($this->form_validation->run() == false) {
			$data = [
				'title' => 'Add Kontrak',
				'cost_unit' => $this->core->get('tb_cost_unit'),
				'cost_center' => $this->core->get('tb_cost_center'),
			];
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/topbar');
			$this->load->view('pengajuan/kontrak/add', $data);
			$this->load->view('layout/footer');
		} else {
			$user_login = $this->core->select('tb_user', ['username_user' => $this->session->userdata('username')]);
			$random = '1234567890abcdefghijklmopqrstuvwxyz';
			$kode_pengajuan = substr(str_shuffle($random), 0, 10);
			$data_pengajuan = [
				'user_id' => $user_login->id_user,
				'kode_pengajuan' => $kode_pengajuan,
				'cost_center_id' => $this->input->post('cost_center_id'),
				'cost_unit_id' => $this->input->post('cost_unit_id'),
				'tanggal_invoice_pengajuan' => $this->input->post('tanggal_invoice_pengajuan'),
				'proyek_pengajuan' => $this->input->post('proyek_pengajuan'),
				'vendor_pengajuan' => $this->input->post('vendor_pengajuan'),
				'alamat_vendor_pengajuan' => $this->input->post('alamat_vendor_pengajuan'),
				'vet_pajak_pengajuan' => $this->input->post('vet_pajak_pengajuan'),
				'dpp_pajak_pengajuan' => $this->input->post('dpp_pajak_pengajuan'),
			];
			$data_histori = [
				'kode_pengajuan' => $data_pengajuan['kode_pengajuan'],
				'user_id' => $user_login->id_user,
				'waktu_awal_submit' => date('Y-m-d H:i:s'),
				'waktu_akhir_submit' => null,
				'status_histori' => 'Menunggu',
				'penerima' => 1,
				
			];
			$this->core->create('tb_pengajuan', $data_pengajuan);
			$this->core->create('tb_histori', $data_histori);

			$this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
					<div class="container text-center">
						<span class="badge badge-success">Berhasil</span> Pengajuan kontrak berhasil dibuat.
					</div>
				</div>
				');
			redirect('pengajuan/kontrak');
		}
	}
	
	public function histori($id)
	{
		$join2 = [
			'join1' => 'tb_user', 'referensi1' => 'tb_user.id_user = tb_histori.user_id',
			'join2' => 'tb_jabatan', 'referensi2' => 'tb_jabatan.id_jabatan = tb_histori.penerima',
		];
		$data = [
			'title' => 'Histori Kontrak',
			'histori' => $this->core->get_join_2tb('tb_histori', $join2, ['select_by' => 'id_histori', 'order_by' => 'ASC']),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/topbar');
		$this->load->view('pengajuan/kontrak/histori', $data);
		$this->load->view('layout/footer');
	}
}
