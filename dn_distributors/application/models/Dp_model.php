<?php

class Dp_model extends CI_Model{
    public function insert_customer_data(){

        $data=array(
            'cus_name'=>$this->input->post('cus_name'),
            'cus_company_name'=>$this->input->post('cus_company_name'),
            'cus_company_address'=>$this->input->post('cus_company_address'),
            'cus_nic'=>$this->input->post('cus_nic'),
            'cus_email'=>$this->input->post('cus_email'),
            'cus_phone'=>$this->input->post('cus_phone'),
            'cus_company_phone'=>$this->input->post('cus_company_phone'),
            'password'=>sha1($this->input->post('password')),
            'confirm_password'=>sha1($this->input->post('confirm_password')));

        $query1 = "INSERT INTO customer(cus_nic, cus_name, cus_email, cus_phone, cus_company_name, cus_company_address, cus_company_phone) VALUES ('$data[cus_nic]', '$data[cus_name]', '$data[cus_email]', '$data[cus_phone]', '$data[cus_company_name]', '$data[cus_company_address]', '$data[cus_company_phone]')";
        $query2 = "INSERT INTO user(user_nic, user_name, user_email, password, confirm_password) VALUES ('$data[cus_nic]', '$data[cus_name]', '$data[cus_email]', '$data[password]', '$data[confirm_password]')";

        $this->db->query($query1);
        $this->db->query($query2);
    }

    public function get_customer_data(){
        $query1 = "SELECT * FROM customer WHERE cus_availability = 1";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public  function get_each_customer($cus_id){
        $query = $this->db->query("SELECT * FROM customer WHERE cus_id = $cus_id");
        return $query->row();
    }

    public function get_product(){
        $query=$this->db->get("product");
        return $query->result() ;

    }

    public function add_order($cus_nic,$order,$data){
        $order_no=substr($cus_nic,0,3).substr($order['order_date'],8,10).rand(10,20);
        $order_details = array(
            'order_id'         => $order_no,
            'cus_nic'          => $cus_nic,
            'ordered_date'     => $order['order_date'],
            'delivery_address' => $order['delivery_address'],
            'order_status'     => 4
        );
        $this->db->insert('orders',$order_details);

        foreach ($data as $item){
            $this->db->select('product_name');
            $this->db->from('product');
            $this->db->where('product_id',$item['id']);
            $product_name =$this->db->get();
            //print_r($product_name);
            $order_product = array(
                'order_id'      => $order_no,
                'product_id'    => $item['id'],
                'product_price' => $item['price'],
                'quantity'      => $item['qty'],
                'total_price'   => $item['subtotal'],
            );
            $this->db->insert('order_product',$order_product);
        }

    }
}