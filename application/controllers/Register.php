<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['user_id'])) redirect();
        $this->load->model('register_model');
    }

    public function index()
    {
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);

        $this->form_rules();
        if ($this->form_validation->run()) {
            if ($this->register_model->oldUser($_POST['email'])) {
                $uploadlog = $this->register_model->register(NULL);
                if (is_null($uploadlog)) {
                    redirect('login');
                } else {
                    $this->session->set_flashdata('error', $uploadlog);
                    redirect('register');
                }
            } else {
                $this->session->set_flashdata('error', 'Email sudah digunakan');
            }
        }

        $this->load->view('pages/register', $data);

        unset($_SESSION['error']);
    }

    public function form_rules()
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
    }
}
