<?php defined('BASEPATH') || exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function render($view, $data = []) {
        $this->load->view('templates/header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/footer');
    }
}
