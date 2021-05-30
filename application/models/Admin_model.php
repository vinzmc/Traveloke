<?php
class Admin_model extends CI_Model
{
    public function getUser()
    {
        $query = $this->db->get('user_login');
        return $query->result_array();
    }

    public function getHotel()
    {
        $query = $this->db->get('hotel_list');
        return $query->result_array();
    }

    public function newUser()
    {
        $this->Userform_rules();
        $this->load->model('register_model');
        $_POST['password'] = $this->generateRandomString();
        $result = $this->form_validation->run();
        if ($result) { //form input validation
            if ($this->register_model->oldUser($_POST['email'])) { //check duplicate user
                $uploadlog = $this->register_model->register(NULL);
                if (is_null($uploadlog)) {
                    $this->session->set_flashdata('msg', 'Password User Baru adalah : ' . $_POST['password']);
                } else {
                    $this->session->set_flashdata('error', $uploadlog);
                }
            } else {
                $this->session->set_flashdata('error', 'Email sudah digunakan');
            }
        } else {
            $this->session->set_flashdata('error', $result);
        }
    }

    public function delUser($uid)
    {
        $data = $this->getUserInfo($uid);
        if ($data['role_id'] == 2) {
            $this->session->set_flashdata('error', 'Data Admin tidak dapat diubah melalui web!');
        } else {
            $this->db->where('user_id', $uid);
            $this->db->delete('user_login');

            $file = str_replace("assets/images/", "", $data['picture']);
            if (strcmp('defaultprofile.png', $file) != 0) {
                $deldir = realpath(APPPATH . '../assets/images/' . $file);
                if (file_exists($deldir)) {
                    unlink($deldir);
                }
                unset($deldir);
            }
        }
    }

    public function updateUser()
    {
        $data = $this->getUserInfo($_POST['user_id']);
        if ($data['role_id'] == 2) {
            $this->session->set_flashdata('error', 'Data Admin tidak dapat diubah melalui web!');
        } else {
            $this->db->set('name', $_POST['name']);
            $this->db->set('email', $_POST['email']);
            $this->db->set('date', $_POST['date']);
            $this->db->set('phone', $_POST['phone']);
            $this->db->set('role_id', $_POST['role_id']);
            $this->db->where('user_id', $_POST['user_id']);
            $this->db->update('user_login');
        }
    }

    public function resetPass($uid)
    {
        $data = $this->admin_model->getUserInfo($uid);
        if ($data['role_id'] == 2) {
            $this->session->set_flashdata('error', 'Data Admin tidak dapat diubah melalui web!');
        } else {
            $temppass = $this->generateRandomString();
            $this->session->set_flashdata('msg', 'Password User baru adalah : ' . $temppass);
            $this->db->set('password', hash("sha256", $temppass));
            $this->db->where('user_id', $uid);
            $this->db->update('user_login');
        }
    }

    public function resetUserPicture($uid)
    {
        $data = $this->getUserInfo($uid);
        if ($data['role_id'] == 2) {
            $this->session->set_flashdata('error', 'Data Admin tidak dapat diubah melalui web!');
        } else {
            if (strcmp('defaultprofile.png', $data['picture']) != 0) {
                $file = str_replace("assets/images/", "", $data['picture']);
                $deldir = realpath(APPPATH . '../assets/images/' . $file);
                if (strcmp('defaultprofile.png', $file) != 0) {
                    if (file_exists($deldir)) {
                        unlink($deldir);
                    }
                }
                unset($deldir);
                $this->db->set('picture', 'assets/images/defaultprofile.png');
                $this->db->where('user_id', $uid);
                $this->db->update('user_login');
            }
        }
    }

    public function updatePicture()
    {
        $data = $this->getUserInfo($_POST['user_id']);
        if ($data['role_id'] == 2) {
            $this->session->set_flashdata('error', 'Data Admin tidak dapat diubah melalui web!');
        } else {
            $this->load->model('user_model');
            $uploadlog = $this->user_model->upload();
            if (is_bool($uploadlog)) { //upload error
                $this->session->set_flashdata('error', 'Gambar yang di upload Error, silahkan coba gambar lain');
            } else if (!is_null($uploadlog)) { //gak kosong
                $this->db->set('picture', $uploadlog);
                $this->db->where('user_id', $_POST['user_id']);
                $this->db->update('user_login');
                $this->session->set_flashdata('msg', 'Gambar user berhasil diganti');
            } else {
                $this->session->set_flashdata('error', 'Tidak ada gambar yang di upload!');
            }
        }
    }

    public function getUserInfo($uid)
    {
        $this->db->where('user_id', $uid);
        $query = $this->db->get('user_login');
        return $query->row_array();
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function Userform_rules()
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

        $this->form_validation->set_rules(
            'role_id',
            'role_id',
            'required',
            array('required' => 'Phone Number Cant Be Empty !')
        );
    }
}
