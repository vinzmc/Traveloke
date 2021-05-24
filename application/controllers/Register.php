<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
    }

    public function index()
    {
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);

        $this->form_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/register', $data);
        } else {
            $uploadlog = $this->uploadFile();
            if(is_null($uploadlog)){
                redirect('login');
            }
            else{
                $this->session->set_flashdata('error', $uploadlog);
                redirect('register');
            }
        }
        unset($_SESSION['error']);
    }

    public function uploadFile() //fungsi untuk upload
    {
        $image_path = realpath(APPPATH . '../assets/images/'); //path
        $new_name = str_replace(' ', '_', $_POST['name']); //name

        $config['upload_path']          = $image_path;
        $config['file_name']             = $new_name;
        $config['allowed_types']        = 'gif|jpg|png|JPG|GIF|PNG|jpeg|JPEG|jfif|JFIF';
        $config['max_size']             = 2000;
        $config['max_width']            = 1280;
        $config['max_height']           = 720;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data = $this->upload->display_errors();
            return $data;
        } else {
            $data = NULL;
        }

        $saved_file_name = 'assets/images/' . $this->upload->data('file_name'); //filename.ext

        //insert
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $date = $this->input->post('date');
        $phone = $this->input->post('phone');
        $this->register_model->register($name, $email, $password, $date, $phone, $saved_file_name);

        unset($_POST);
        return $data;
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
