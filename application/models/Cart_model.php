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

    public function cartList()
    {
    }

    public function insertItem()
    {
        $this->load->model('admin_model');
        $this->load->helper('date');
        $format = "%Y-%m-%d %h:%i %A";
        $sku = $this->admin_model->generateRandomString(6);
        $row = $this->getRow();
        $data = array(
            'id'      => $row['hotel-id'],
            'qty'     => 1,
            'price'   => $row['hotel-price'],
            'name'    => $row['hotel-name'],
            'options' => array('img' => $row['hotel-photo'], 'user_id' => $_SESSION['user_id'], 'date' => mdate($format))
        );

        $this->cart->insert($data);
    }

    public function deleteItem()
    {
        $data = array(
            'rowid'   => $_POST['rowid'],
            'qty'     => 0
        );

        $this->cart->update($data);
    }

    public function approveItem()
    {
        $item = $this->cart->get_item($_POST['rowid']);
        $this->db->set('`hotel-id`', $item['id']);
        $this->db->set('date', $item['options']['date']);
        $this->db->set('user_id', $_SESSION['user_id']);
        $this->db->set('name', $item['name']);
        $this->db->set('number', $item['rowid']);
        $this->db->set('total', $item['price']);
        $this->db->set('qty', $item['qty']);
        $this->db->insert('transaction');

        $this->db->where('`hotel-id`', $item['id']);
        $query = $this->db->get('hotel_list');
        $row = $query->row_array();

        $this->db->set('`hotel-stock`', ($row['hotel-stock']-1));
        $this->db->where('`hotel-id`', $item['id']);
        $this->db->update('hotel_list');

        $this->deleteItem();
    }
}
