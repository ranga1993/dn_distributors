<?php
class Admin_model extends CI_model{

    public function insert_dp_data(){

        $data=array(
            'name'=>$this->input->post('name'),
            'address'=>$this->input->post('address'),
            'nic'=>$this->input->post('nic'),
            'email'=>$this->input->post('email'),
            'contact_number'=>$this->input->post('contact_number'),
            'password'=>sha1($this->input->post('password')),
            'confirm_password'=>sha1($this->input->post('confirm_password')));

        $query1 = "INSERT INTO delivery_person(dp_name, address, nic, email, contact_number) VALUES ('$data[name]', '$data[address]', '$data[nic]', '$data[email]', '$data[contact_number]')";
        $query2 = "INSERT INTO user(name, email, password, confirm_password) VALUES ('$data[name]', '$data[email]', '$data[password]', '$data[confirm_password]')";

        $this->db->query($query1);
        $this->db->query($query2);
    }

    public function update_customer_data(){

        $data=array(
            'name'=>$this->input->post('name'),
            'company_name'=>$this->input->post('company_name'),
            'address'=>$this->input->post('address'),
            'nic'=>$this->input->post('nic'),
            'email'=>$this->input->post('email'),
            'contact_number'=>$this->input->post('contact_number'),
            'password'=>sha1($this->input->post('password')),
            'confirm_password'=>sha1($this->input->post('confirm_password')));

        $query1 = "UPDATE customer SET company_name = '$data[company_name]', address = '$data[address]', nic = '$data[nic]', email = '$data[email]', contact_number = '$data[contact_number]' WHERE customer_name = '$data[name]'";
        $query2 = "UPDATE user SET email = '$data[email]', password = '$data[password]', confirm_password = '$data[confirm_password]' WHERE name = '$data[name]'";

        $this->db->query($query1);
        $this->db->query($query2);
    }

    public function update_dp_data(){

        $data=array(
            'name'=>$this->input->post('name'),
            'address'=>$this->input->post('address'),
            'nic'=>$this->input->post('nic'),
            'email'=>$this->input->post('email'),
            'contact_number'=>$this->input->post('contact_number'),
            'password'=>sha1($this->input->post('password')),
            'confirm_password'=>sha1($this->input->post('confirm_password')));

        $query1 = "UPDATE delivery_person SET address = '$data[address]', nic = '$data[nic]', email = '$data[email]', contact_number = '$data[contact_number]' WHERE dp_name = '$data[name]'";
        $query2 = "UPDATE user SET email = '$data[email]', password = '$data[password]', confirm_password = '$data[confirm_password]' WHERE name = '$data[name]'";

        $this->db->query($query1);
        $this->db->query($query2);
    }

    public function get_customer_data(){
        $query1 = "SELECT * FROM customer WHERE status = 1";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_dp_data(){
        $query1 = "SELECT * FROM delivery_person WHERE status = 1";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_pending_orders(){
        $query1 = "SELECT * FROM order_details WHERE order_status = 1";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_delivered_orders(){
        $query1 = "SELECT * FROM order_details WHERE order_status = 2";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_product_details(){
        $query1 = "SELECT * FROM product WHERE product_status = 1";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function remove_customer(){
        $data = array(
            'name'=>$this->input->post('name')
        );

        $query = "UPDATE customer SET status = 2 WHERE customer_name = '$data[name]'";
        $this->db->query($query);
    }

    public function remove_product(){
        $data = array(
            'product_code'=>$this->input->post('product_code')
        );

        $query = "UPDATE product SET status = 2 WHERE product_code = '$data[product_code]'";
        $this->db->query($query);
    }


    public function remove_dp(){
        $data = array(
            'name'=>$this->input->post('name')
        );

        $query = "UPDATE delivery_person SET status = 2 WHERE dp_name = '$data[name]'";
        $this->db->query($query);
    }

    public function add_product(){

        $data=array(
            'product_code'=>$this->input->post('product_code'),
            'product_name'=>$this->input->post('product_name'),
            'type'=>$this->input->post('type'),
            'description'=>$this->input->post('description'),
            'image'=>$this->input->post('image'),
            'price'=>$this->input->post('price'));

        $query1 = "INSERT INTO product(product_code, product_name, type, description, image, unit_price) VALUES ('$data[product_code]', '$data[product_name]', '$data[type]', '$data[description]', '$data[image]', '$data[price]')";

        $this->db->query($query1);
    }

    public function update_product(){

        $data=array(
            'product_code'=>$this->input->post('product_code'),
            'product_name'=>$this->input->post('product_name'),
            'type'=>$this->input->post('type'),
            'description'=>$this->input->post('description'),
            'image'=>$this->input->post('image'),
            'price'=>$this->input->post('price'));

        $query1 = "UPDATE product SET product_code = '$data[product_code]', product_name = '$data[product_name]', type = '$data[type]', description = '$data[description]', image = '$data[image]', unit_price = '$data[price]' WHERE product_code = '$data[product_code]'";

        $this->db->query($query1);
    }
}