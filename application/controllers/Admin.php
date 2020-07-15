<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        redirect('auth');
    }

    public function dashboard()
    {

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->Admin_model->dashboard();
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        redirect('auth');
    }
}
