<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function index()
    {
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
        $this->load->view('pages/register', $data);
    }

    function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
    }

    public function process()
    {
        $this->form_validation->set_rules(
            'name',
            'name',
            'required',
            array('required' => 'Name Cant Be Empty !')
        );

        $this->form_validation->set_rules(
            'email',
            'email',
            'required',
            array('required' => 'Email Cant Be Empty !')
        );

        $this->form_validation->set_rules(
            'password',
            'password',
            'required',
            array('required' => 'Password Cant Be Empty !')
        );

        $this->form_validation->set_rules(
            'repassword',
            'repassword',
            'required|matches[password]',
            array('required' => 'Re-Type Password Cant Be Empty !')
        );

        $this->form_validation->set_rules(
            'date',
            'date',
            'required',
            array('required' => 'Date Cant Be Empty !')
        );

        $this->form_validation->set_rules(
            'phone',
            'phone',
            'required',
            array('required' => 'Phone Number Cant Be Empty !')
        );
        if ($this->form_validation->run() == true) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $date = $this->input->post('date');
            $phone = $this->input->post('phone');
            $picture = $this->input->post('picture');
            $this->auth->register($name, $email, $password, $date, $phone, $picture);
            $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('register');
        }
    }
}
