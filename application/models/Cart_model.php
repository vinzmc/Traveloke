<?php
class Cart_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRow()
    {
        $this->db->where('`hotel-id`', $_POST['id']);
        $query = $this->db->get('hotel_list');
        return $query->row_array();
    }

    public function getTodayDate()
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d";
        return mdate($format);
    }

    public function formCheck()
    {
        if (!isset($_POST['name'])) {
            $this->session->set_flashdata('error', 'Nama tidak boleh dikosongkan!');
            return false;
        }
        if (!isset($_POST['phone'])) {
            $this->session->set_flashdata('error', 'Nomor Telpon tidak boleh dikosongkan!');
            return false;
        }
        if (!isset($_POST['email'])) {
            $this->session->set_flashdata('error', 'Email tidak boleh dikosongkan!');
            return false;
        }
        if (!isset($_POST['inDate'])) {
            $this->session->set_flashdata('error', 'Tanggal Check-in tidak boleh dikosongkan!');
            return false;
        }
        if (!isset($_POST['outDate'])) {
            $this->session->set_flashdata('error', 'Tanggal Check-in tidak boleh dikosongkan!');
            return false;
        }
        if (strtotime($_POST['inDate']) >= strtotime($_POST['outDate'])) {
            $this->session->set_flashdata('error', 'Tanggal Check-in dan Check-out bertabrakan!');
            return false;
        }
        if (!isset($_POST['room'])) {
            $this->session->set_flashdata('error', 'Jumlah Ruangan tidak boleh dikosongkan!');
            return false;
        }
        $result = $this->getRow();
        if ($_POST['room'] > $result['hotel-stock']) {
            $this->session->set_flashdata('error', 'Jumlah ruangan yang dipesan tidak tersedia');
            return false;
        }
        return true;
    }

    public function insertItem()
    {
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %A";
        
        if (!$this->formCheck()) return false;
        $row = $this->getRow();

        $diff = abs(strtotime($_POST['outDate']) - strtotime($_POST['inDate']));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $months = $months*30;
        $years = $years*365;
        $days = $days + $months + $years;

        $cost = $row['hotel-price'] * $_POST['room'];
        $cost *= $days;
        $data = array(
            'id'      => $row['hotel-id'],
            'qty'     => $_POST['room'],
            'price'   => $cost,
            'name'    => $_POST['name'],
            'options' => array(
                'img' => $row['hotel-photo'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'user_id' => $_SESSION['user_id'],
                'tDate' => mdate($format),
                'iDate' => $_POST['inDate'],
                'oDate' => $_POST['outDate']
            )
        );

        $this->cart->insert($data);
        return true;
    }

    public function approveItem()
    {
        $item = $this->cart->get_item($_POST['rowid']);
        //db identifier
        $this->db->set('`hotel-id`', $item['id']);
        $this->db->set('user_id', $_SESSION['user_id']);
        //date
        $this->db->set('tDate', $item['options']['tDate']);
        $this->db->set('iDate', $item['options']['iDate']);
        $this->db->set('oDate', $item['options']['oDate']);
        //contact person
        $this->db->set('name', $item['name']);
        $this->db->set('phone', $item['options']['phone']);
        $this->db->set('email', $item['options']['email']);

        $this->db->set('number', $item['rowid']);
        $this->db->set('total', $item['price']);
        $this->db->set('qty', $item['qty']);
        $this->db->insert('transaction');

        $this->db->where('`hotel-id`', $item['id']);
        $query = $this->db->get('hotel_list');
        $row = $query->row_array();

        $this->db->set('`hotel-stock`', ($row['hotel-stock'] - $item['qty']));
        $this->db->where('`hotel-id`', $item['id']);
        $this->db->update('hotel_list');

        $this->deleteItem();
    }

    public function deleteItem()
    {
        $data = array(
            'rowid'   => $_POST['rowid'],
            'qty'     => 0
        );

        $this->cart->update($data);
    }
}
