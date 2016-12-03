<?php

class Note extends CI_Model {
	public $id;
    public $note;
    public $name;
    public $created_at;
    public $updated_at;

	private $table = 'notes';

	public function __construct() {
		parent::__construct();
	}

	public function find_one($params = []) {
		$data = $this->db->get_where($this->table, $params)->result();
		if (count($data)) {
			return $data[0];
		}
	}

	public function find_all($params = []) {
		return $this->db->get_where($this->table, $params)->result();
    }

    public function create() {
    	$this->load->helper('url');
        $today = date('Y-m-d H:i:s');
        $slug = url_title($_POST['name'], 'dash', TRUE);

    	$data = [
    		'slug' => $slug,
    		'created_at' => $today,
    		'name' => $_POST['name'],
    		'note' => $_POST['note']
    	];
        return $this->db->insert($this->table, $data);
    }

    public function update() {
    	$this->load->helper('url');
        $today = date('Y-m-d H:i:s');
        $slug = url_title($_POST['name'], 'dash', TRUE);

    	$data = [
    		'slug' => $slug,
    		'updated_at' => $today,
    		'name' => $_POST['name'],
    		'note' => $_POST['note']
    	];
        return $this->db->update($this->table, $data, ['id' => $_POST['id']]);
    }

    public function delete() {
        return $this->db->delete($this->table, ['id' => $_POST['id']]);
    }
}
