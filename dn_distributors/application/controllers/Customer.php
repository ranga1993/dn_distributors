<?php


class Customer extends CI_Controller
{
    public function index(){
        //$this->load->view('templates/form');
        $this->load->view('Customer/customer_main_view');

    }

    public function LoadDeliveredOrder(){
        $cusID=1;
        $this->load->model('customer_model');
        $data['delivered_orders']=$this->customer_model->get_delivered_orders($cusID);
        $this->load->view('Customer/cus_view_delivered_orders', $data);
    }

    public function LoadPendingOrder(){
        $cusID =1;
        $this->load->model('customer_model');
        $data['pending_orders']=$this->customer_model->get_pending_orders($cusID);
        $this->load->view('Customer/cus_view_pending_orders',$data);
    }


    public function Registration(){

        $data=array('success'=>false,'massages'=>array());

        $this->form_validation->set_rules('cus_name','cus_name','required');
        $this->form_validation->set_rules('cus_nic','cus_nic','required');
        $this->form_validation->set_rules('cus_address','cus_address','required');
        $this->form_validation->set_rules('cus_fixed_phone','cus_fixed_phone','required');
        $this->form_validation->set_rules('cus_mobile_phone','cus_mobile_phone','required');
        $this->form_validation->set_rules('cus_email','cus_email','required|valid_email|is_unique[customer.cus_email]');
        $this->form_validation->set_rules('cus_com_name','cus_com_name','required');
        $this->form_validation->set_rules('cus_com_address','cus_com_address','required');
        $this->form_validation->set_rules('cus_com_phone','cus_com_phone','required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>' );

        if($this->form_validation->run() == FALSE ){
            //$this->session->set_flashdata('massage','You input some wrong details.please try again!!');
            //redirect('Customer/Registration');
            //echo '<div class="errors">'.validation_errors().'</div>';

            foreach($_POST as $key => $value){
                $data['massages'][$key]=form_error($key);
            }

        }

        else
        {
            $data['success']=true;

            $this->load->model('customer_model');
            $respond=$this->customer_model->Reg_customer();
            //echo 'djjhi';
            /*if($respond){
                $this->session->set_flashdata('massage','Registration Successful');
                redirect('Customer');
            }

            else{
                $this->session->set_flashdata('massage','Registration Unsuccessful. Please Try Again.');
                redirect('Customer/Registration');
            }*/

        }

        echo json_encode($data);



    }

    public function ViewRegDetails(){
        //echo'aaa';
        $cusID=5;
        $this->load->model('customer_model');

        //get details of customer
        $details['customer']=$this->customer_model->get_customer($cusID);

        $this->load->view('Customer/cus_edit_reg_details',$details);
        //print_r($details);
    }

    public function EditRegDetails(){
        /*$data=array('success'=>false,'massages'=>array());*/
        $cusID=$this->input->post('cus_id');

        $this->form_validation->set_rules('cus_name','cus_name','required');
        $this->form_validation->set_rules('cus_nic','cus_nic','required');
        $this->form_validation->set_rules('cus_address','cus_address','required');
        $this->form_validation->set_rules('cus_fixed_phone','cus_fixed_phone','required');
        $this->form_validation->set_rules('cus_mobile_phone','cus_mobile_phone','required');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('cus_com_name','cus_com_name','required');
        $this->form_validation->set_rules('cus_com_address','cus_com_address','required');
        $this->form_validation->set_rules('cus_com_phone','cus_com_phone','required');
        //$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>' );

        if($this->form_validation->run() == FALSE ){
            //$this->session->set_flashdata('massage','You input some wrong details.please try again!!');
            //redirect('Customer/Registration');
            //echo '<div class="errors">'.validation_errors().'</div>';

            //foreach($_POST as $key => $value){
                //$data['massages'][$key]=form_error($key);
            //}

            echo "something wrong";

        }

        else
        {
            //$data['success']=true;


            $this->load->model('customer_model');
            $this->customer_model->Update_Customer($cusID);
            redirect('/Customer/ViewRegDetails');

        }

        //echo json_encode($data);

    }

    public function LoadFeedback(){
        $order_id=$this->input->post('order_no') ;
        $this->load->model('customer_model');
        $details['order']=$this->customer_model->get_order($order_id);

        //print_r($details);
        //$details['product']=$this->customer_model->get_product();
        $this->load->view('Customer/cus_feedback_view',$details);

    }

    public function Feedback(){

        $this->form_validation->set_rules('cus_feedback','cus_feedback','required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('massage','You Input Again..!!');
            redirect('Customer_Feedback/');



        }

        else{

            $this->load->model('customer_model');
            $this->customer_model->customer_feedback();
//            echo 'aaa';

        }


    }




    public function MakeOrder(){

        $cus_id='1';
        $this->load->model('customer_model');
        $details['customer']=$this->customer_model->get_customer($cus_id);
        print_r($details);
        $details['product']=$this->customer_model->get_product();
        $this->load->view('Customer/cus_Makeorder_view',$details);


    }

}