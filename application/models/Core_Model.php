<?php
class Core_Model extends CI_Model
{


	public function get_all_user($order = null)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->join('tb_unit', 'tb_unit.id_unit = tb_user.unit_id');
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}

	public function select_user($param, $order = null)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where($param);
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		$query = $this->db->get()->row();
		return $query;
	}

	public function get_all_unit($order = null)
	{
		$this->db->select('*');
		$this->db->from('tb_unit');
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}

	public function select_pengajuan($param)
	{
		$this->db->select('*');
		$this->db->from('tb_pengajuan');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pengajuan.user_id');
		$this->db->join('tb_cost_center', 'tb_cost_center.id_cost_center = tb_pengajuan.cost_center_id');
		$this->db->join('tb_cost_unit', 'tb_cost_unit.id_cost_unit = tb_pengajuan.cost_unit_id');
		$this->db->where($param);
		$query = $this->db->get()->row();
		return $query;
	}

	public function get_all_histori($where = null, $order = null)
	{
		$this->db->select('*');
		$this->db->from('tb_histori');
		if ($where != null) {
			$this->db->where($where);
		}
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}

	public function select_histori($param,  $order = null)
	{
		$this->db->select('*');
		$this->db->from('tb_histori');
		$this->db->where($param);
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		$query = $this->db->get()->row();
		return $query;
	}

	public function update_histori($where, $data)
	{
		$this->db->where($where);
		return $this->db->update('tb_histori', $data);
	}










	// ----------------------------------------------------------------------------------------------


	public function get($table, $order = null)
	{
		$this->db->select('*');
		$this->db->from($table);
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}


	public function get_join_1tb($table, $where, $join, $order = null)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$this->db->join($join['join'], $join['referensi']);
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}

	public function get_join_2tb($table, $join, $order = null)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join['join1'], $join['referensi1']);
		$this->db->join($join['join2'], $join['referensi2']);
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}

	public function create($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function select_join_2tb($table, $where, $join, $order = null)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$this->db->join($join['join1'], $join['referensi1']);
		$this->db->join($join['join2'], $join['referensi2']);
		if ($order != null) {
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->row();
	}

	public function select($table, $where)
	{
		return $this->db->get_where($table, $where)->row();
	}

	public function delete($table, $where)
	{
		$this->db->where($where['param'], $where['id']);
		return $this->db->delete($table);
	}
}
