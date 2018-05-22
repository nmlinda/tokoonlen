<?php
require APPPATH . '/libraries/REST_Controller.php';
class Api extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
	}
	function index_get() {
		$id = $this->get('id');
		if ($id == '') {
			$product = $this->db->get('m_item')->result();
		} else {
			$this->db->where('id_item', $id);
			$product = $this->db->get('m_item')->result();
		}
		$this->response($product, 200);
	}
	// function index_post() {
	// 	$data = array(
	// 		'id_item' => $this->input->post('item_id'),
	// 		'item_name' => $this->input->post('item_name'),
	// 		'note' => $this->input->post('item_note'),
	// 		'stock' => $this->input->post('item_stock'),
	// 		'price' => $this->input->post('item_price'),
	// 		'unit' => $this->input->post('item_unit')
	// 		);
	// 	$insert = $this->db->insert('m_item', $data);
	// 	if ($insert) {
	// 		$this->response($data, 200);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }
	// function index_put() {
	// 	$id = $this->put('item_id');
	// 	$data = array(
	// 		'item_name' => $this->put('item_name'),
	// 		'note' => $this->put('note'),
	// 		'stock' => $this->put('stock'),
	// 		'price' => $this->put('price'),
	// 		'unit' => $this->put('unit')
	// 		);
	// 	$this->db->where('id_item', $id);
	// 	$update = $this->db->update('m_item', $data);
	// 	if ($update) {
	// 		$this->response($data, 200);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }
	// function index_delete() {
	// 	$id = $this->delete('item_id');
	// 	$this->db->where('id_item', $id);
	// 	$delete = $this->db->delete('m_item');
	// 	if ($delete) {
	// 		$this->response(array('status' => 'success'), 201);
	// 	} else {
	// 		$this->response(array('status' => 'fail', 502));
	// 	}
	// }
}