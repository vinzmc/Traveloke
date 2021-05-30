<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update()
    {
        if (!isset($_POST['oldpass'])) {
            return FALSE;
        }
        // CHECK OLD PASSWORD
        $oldpass = hash("sha256", $_POST['oldpass']);
        $this->db->where('user_id', $_SESSION['user_id']);
        $this->db->where('password', $oldpass);
        $query = $this->db->get('user_login');
        if ($query->num_rows() < 1) {
            return FALSE;
        }
        $this->db->reset_query();

        $count = 0;
        $count += $this->checkData('name');
        $count += $this->checkData('phone');
        $count += $this->checkData('email');
        if (isset($_POST['npass']) && isset($_POST['passv']) && $_POST['npass'] != '') {
            if ($_POST['npass'] == $_POST['passv']) {
                $this->db->set('password', hash("sha256", $_POST['npass']));
                $count++;
            }
        }

        $uploadlog = $this->upload();
        if (is_bool($uploadlog)) { //upload error
            $this->session->set_flashdata('error', 'Gambar yang di upload Error, silahkan coba gambar lain');
        } else if (!is_null($uploadlog)) { //gak kosong
            $this->db->set('picture', $uploadlog);
            $count++;
            $fileUp = true;
        }

        if ($count != 0) {
            
            $this->db->where('user_id', $_SESSION['user_id']);
            $this->db->update('user_login');
            $this->db->reset_query();

            if($fileUp){
                if (strcmp('defaultprofile.png', $_POST['dir']) != 0) {
                    $deldir = realpath(APPPATH . '../assets/images/' .  $_POST['dir']); 
                    if (file_exists($deldir)) {
                        unlink($deldir);
                    }
                    unset($deldir);
                }
            }

            $this->db->where('user_id', $_SESSION['user_id']);
            $query = $this->db->get('user_login');
            $row = $query->row();

            $this->session->set_userdata('user_id', $row->user_id);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('role_id', $row->role_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('phone', $row->phone);
            $this->session->set_userdata('picture', $row->picture);

            if($row->password != $oldpass){
                return 'pass';
            }
            return TRUE;
        }
        return false;
    }

    public function upload() //fungsi untuk upload
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

        //error checking
        if (!$this->upload->do_upload('userfile')) {
            $data = $this->upload->display_errors();
            //String case sensitive jangan diganti/dirapihin
            if (strcmp($data, "
			You did not select a file to upload.
			
			")) { //kalo ga ada file
                return NULL;
            } else { //kalo error
                return FALSE;
            }
        } else {
            return 'assets/images/' . $this->upload->data('file_name'); //filename.ext
        }
        return FALSE;
    }

    public function checkData($varname)
    {
        if (!isset($_POST["$varname"]) || $_POST["$varname"] == '') {
            return 0;
        } else if ($_POST["$varname"] != $_SESSION["$varname"]) {
            $this->db->set($varname, $_POST["$varname"]);
            return 1;
        } else {
            return 0;
        }
    }
}
