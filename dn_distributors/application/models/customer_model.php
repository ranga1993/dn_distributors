<?php

class customer_model extends CI_Model
{
    public function get_customer($cus_id){

        $this->db->where('customer_id', $cus_id);
        $query=$this->db->get("customer");
        return $query->result() ;
    }

    public function get_order($order_id){
        $this->db->where('order_no', $order_id);
        $query=$this->db->get("order_det");
        return $query->result() ;

    }

    public function get_product(){

        $query=$this->db->get("product");
        return $query->result() ;

    }

    public function Reg_customer(){
        $data=array(
            'cus_name'=>$this->input->post('cus_name',TRUE),
            'cus_address'=>$this->input->post('cus_address',TRUE),
            'cus_nic'=>$this->input->post('cus_nic',TRUE),
            'cus_fixed_phone'=>$this->input->post('cus_fixed_phone',TRUE),
            'cus_mobile_phone'=>$this->input->post('cus_mobile_phone',TRUE),
            'cus_email'=>$this->input->post('cus_email',TRUE),
            'cus_com_name'=>$this->input->post('cus_com_name',TRUE),
            'cus_com_address'=>$this->input->post('cus_com_address',TRUE),
            'cus_com_phone'=>$this->input->post('cus_com_phone',TRUE)
        );

        return $this->db->insert('customer',$data);

    }

    public function Update_Customer($cusID){
        $data=array(
            'customer_name'=>$this->input->post('cus_name',TRUE),
            'address'=>$this->input->post('cus_address',TRUE),
            'nic'=>$this->input->post('cus_nic',TRUE),
            'cus_fixed_phone'=>$this->input->post('cus_fixed_phone',TRUE),
            'cus_mobile_phone'=>$this->input->post('cus_mobile_phone',TRUE),
            'email'=>$this->input->post('email',TRUE),
            'company_name'=>$this->input->post('cus_com_name',TRUE),
            'cus_com_address'=>$this->input->post('cus_com_address',TRUE),
            'cus_com_phone'=>$this->input->post('cus_com_phone',TRUE)
        );

        return $this->db->update('customer', $data, "customer_id = $cusID");

    }


    public function customer_feedback(){

        $data=array(
            'order_no'=>$this->input->post('cus_name',TRUE),
            'deliver_date'=>$this->input->post('cus_address',TRUE),
            'dp_name'=>$this->input->post('cus_nic',TRUE),
            'customer_name'=>$this->input->post('cus_fixed_phone',TRUE),
            'customer_feedback'=>$this->input->post('cus_mobile_phone',TRUE)

        );

        return $this->db->insert('delivered_order',$data);


    }

    public function get_delivered_orders($cusID){
       /* $this->db->where('cus_id', $cusID);
        $query=$this->db->get("delivered_order");
        return $query ;*/
        $this->db->select('t1.order_number, t1.order_date,t1.customer_name, t2.product_code, t2.quantity, t2.price');
        $this->db->from('order_details as t1');
        $this->db->where('t1.cus_id', $cusID);
        $this->db->join('order_product as t2', 't1.order_number = t2.order_no', '');
        $query=$this->db->get();
        return $query;


    }

    public function get_pending_orders($cusID){
        $this->db->where('cus_id', $cusID);
        $query=$this->db->get("order_det");
        return $query ;
    }

}