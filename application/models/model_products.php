<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Model_products extends CI_Model {

	

	public function getCategories() {

		$data = array();

		$query = $this -> db -> query("SELECT * FROM categories");

		if ($query -> num_rows() > 0) {

			$data['categories'] = $query -> result_array();

		}

		return $data;

	}

	public function getProducts($categories) {

		$data = array();

		$sql = "SELECT p.id,p.machine_name prg_machine,p.title,p.body,p.price,c.machine_name,c.name,
            IF(f.name IS NULL or f.name = '', 'default.jpg', f.name) as image
            FROM products p
            JOIN categories c ON c.id = p.categorie_id
            LEFT JOIN field_data_product_image f ON f.product_id = p.id         
            WHERE c.machine_name = ? AND p.visibility = 1 ";

		$query = $this -> db -> query($sql, array($categories));

		if ($query -> num_rows() > 0) {

			$data['products'] = $query -> result_array();

		}

		return $data;

	}

	public function getItem($product) {

		$data = array();

		$sql = "SELECT p.*,IF(f.name IS NULL or f.name = '', 'default.jpg', f.name) as image FROM products p
            LEFT JOIN field_data_product_image f ON f.product_id = p.id              
            WHERE machine_name = ? LIMIT 1";

		$query = $this -> db -> query($sql, array($product));

		if ($query -> num_rows() > 0) {

			$data = $query -> result_array();
			$data = $data[0];

		}

		return $data;

	}

}
