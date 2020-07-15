<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Depan extends CI_Controller
{
    public function index()
    {

        $data['judul'] = 'Beranda | ';
        $data['title'] = 'dSchool';
        $data['subtitle'] = 'The Right Place for The Bright Future';

        $this->load->view('front/header.php', $data);
        $this->load->view('web/home.php');
        $this->load->view('web/up-side.php');
        $this->load->view('front/footer.php');
    }
}
