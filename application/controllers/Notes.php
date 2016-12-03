<?php defined('BASEPATH') || exit('No direct script access allowed');

class Notes extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('note');
    }

    public function index($id = 0) {
        $data['title'] = 'All Notes';
        $data['notes'] = $this->note->find_all();
        if ($id) {
            $data['note'] = $this->note->find_one(['id' => $id]);
        }
        return $this->render('notes/index', $data);
    }

    public function new () {
        $data['title'] = 'Create New Note';
        $data['note'] = $this->note;

        $this->validation();

        if ($this->form_validation->run() !== FALSE) {
            $this->note->create();
        }

        return $this->render("notes/new", $data);
    }

    public function edit($id = 0) {
        if (empty($id)) {
            show_404();
        }

        $data['title'] = 'Update Exists Note';
        $data['note'] = $this->note->find_one(['id' => $id]);

        $this->validation();

        if ($this->form_validation->run() !== FALSE) {
            $this->note->update($id);
        }

        return $this->render("notes/edit", $data);
    }

    public function view($id = 0) {
        if (empty($id)) {
            show_404();
        }
        $data['note'] = $this->note->find_one(['id' => $id]);
        return $this->render("notes/view", $data);
    }

    public function delete($id = 0) {
        if (empty($id)) {
            show_404();
        }

        $this->note->delete($id);
        return redirect(base_url('notes'));
    }

    private function validation() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name is required', 'required');
        $this->form_validation->set_rules('note', 'Note is required', 'required');
    }
}
