<?php defined('BASEPATH') || exit('No direct script access allowed');

class Notes extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('note');
        $this->load->library("pagination");
    }

    public function index() {
        $data['title'] = 'All Notes';

        $perPage = 1;
        $this->pagination->initialize([
            'per_page'        => $perPage,
            'uri_segment'     => 3,
            'base_url'        => base_url('notes/index'),
            'total_rows'      => $this->note->count(),
            'first_tag_open'  => '<li>',
            'first_tag_close' => '</li>',
            'last_tag_open'   => '<li>',
            'last_tag_close'  => '</li>',
            'next_tag_open'   => '<li>',
            'next_tag_close'  => '</li>',
            'prev_tag_open'   => '<li>',
            'prev_tag_close'  => '</li>',
            'cur_tag_open'    => '<li class="active"><a href="#">',
            'cur_tag_close'   => '</a></li>',
            'num_tag_open'    => '<li>',
            'num_tag_close'   => '</li>',

            'first_link'     => 'First',
            'last_link'      => 'last',
            'prev_link'      => '&laquo',
            'next_link'      => '&raquo',
            'full_tag_open'  => '<ul class="pagination">',
            'full_tag_close' => '</ul>'
        ]);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["notes"] = $this->note->paginate($perPage, $page);
        $data["links"] = $this->pagination->create_links();

        return $this->render('notes/index', $data);
    }

    public function new () {
        $data['title'] = 'Create New Note';
        $data['note'] = $this->note;

        $this->validation();

        if ($this->form_validation->run() !== FALSE) {
            $this->note->create();
            $this->session->set_flashdata('message', 'Note created successfully');
            return redirect(base_url('notes'));
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
            $this->session->set_flashdata('message', 'Note updated successfully');
            return redirect(base_url('notes'));
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
        $this->session->set_flashdata('message', 'Note deleted successfully');
        return redirect(base_url('notes'));
    }

    private function validation() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name is required', 'required');
        $this->form_validation->set_rules('note', 'Note is required', 'required');
    }
}
