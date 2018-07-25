<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_person extends CI_Controller{
    public function index(){
        $this->load->view('DP/delivery_person');
    }

    public function register_customer(){
        $this->load->view('DP/register_customer');
    }

    public function customer_registration(){
        $this->form_validation->set_rules('cus_name', 'cus_name', 'required');
        $this->form_validation->set_rules('cus_company_name', 'cus_company_name', 'required');
        $this->form_validation->set_rules('cus_company_address', 'cus_company_address', 'required');
        $this->form_validation->set_rules('cus_nic', 'cus_nic', 'required|is_unique[customer.cus_nic]|is_unique[user.user_nic]');
        $this->form_validation->set_rules('cus_email', 'cus_email', 'required|valid_email|is_unique[customer.cus_email]|is_unique[user.user_email]');
        $this->form_validation->set_rules('cus_phone', 'cus_phone', 'required|is_unique[customer.cus_phone]');
        $this->form_validation->set_rules('cus_company_phone', 'cus_company_phone', 'required|is_unique[customer.cus_company_phone]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Dp_model');
            $this->Dp_model->insert_customer_data();
            redirect('Delivery_person');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function view_customer(){
        $this->load->model('Dp_model');
        $data['h'] = $this->Dp_model->get_customer_data();
        $this->load->view('DP/view_customer', $data);
    }

    public function view_each_customer($cus_id){
        $this->load->model('Dp_model');
        $data = $this->Dp_model->get_each_customer($cus_id);
        echo json_encode($data);
    }

    public function MakeOrder(){
        $this->load->model('Dp_model');
        $details['product']=$this->Dp_model->get_product();
        //print_r($details);
        $this->load->view('DP/dp_make_order',$details);

    }

    public function MakeOrderDirect(){
        $details['cus_nic'] = $_POST["cus_nic"];
        $details['cus_company_address'] = $_POST["cus_company_address"];
        $this->load->model('Dp_model');
        $details['product']=$this->Dp_model->get_product();
        print_r($details);
        $this->load->view('DP/dp_make_order',$details);

    }

    public function  AddToCart(){

        $data= array(
            "id"    => $_POST["product_id"],
            "name"  => $_POST["product_name"],
            "qty"   => $_POST["quantity"],
            "price" => $_POST["product_price"],
        );
        $this->cartdata = $data;
        $this->cart->insert($data);
        echo $this->ViewCart();

    }

    public function ViewCart(){

        $output='';
        $output.= '
            <h3> Your Order</h3>
            <div class = "table-responsive" >

                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Item Name</th>
                        <th width="15%">Quantity</th>
                        <th width="15%">Price(Rs.)</th>
                        <th width="15%">Total Price(Rs.)</th>
                        <th width="15%">Action</th>
                    </tr>
        ';
        $count = 0;
        foreach($this->cart->contents() as $item){
            $count++;
            $output .= '
                    <tr>
                        <td>'.$item["name"].'</td>
                        <td>'.$item["qty"].'</td>
                        <td>'.$item["price"].'</td>
                        <td>'.$item["subtotal"].'</td>
                        <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$item["rowid"].'"  >Remove</button></td>
                    </tr>
            ';
        }
        $output .='
                    <tr>
                        <td colspan="3" align="right" >Total Price of Your Order (Rs.)</td>
                        <td>'.$this->cart->total(). '</td>
                    </tr>
                </table>
            </div>
        ';

        if($count==0){
            $output = '<h3 align="center">Order is Empty</h3>';
        }
        return $output ;
    }

    public function LoadCart(){
        echo $this->ViewCart();
    }

    public function RemoveItem(){
        $row_id = $_POST["row_id"];
        //echo $row_id;
        $data = array(
            'rowid'   => $row_id,
            'qty'     => 0
        );

        $this->cart->update($data);
        echo $this->ViewCart();
    }

    public function ClearCart(){
        $this->cart->destroy();
        echo $this->ViewCart();
    }

    function SubmitOrder(){

        $delivery_address=$this->input->post('delivery_address') ;
        $order_date=$this->input->post('delivery_date') ;
        $cus_nic =$this->input->post('cus_nic') ;
        $count = 0;
        $order['delivery_address']=$delivery_address;
        $order['order_date'] = $order_date;

        foreach($this->cart->contents() as $item){
            $count++;
            //print_r($item);
            $data[] = $item ;
        }

        //print_r($cus_nic);
        if($count==0){
            $massage=array('massage' => 'Please add items to order before submit..','class' => 'alert alert-warning fade in');
            $this->session->set_flashdata('massage',$massage);
            redirect('/Delivery_person/MakeOrder');
        }
        else{
            $this->load->model('Dp_model');
            $this->Dp_model->add_order($cus_nic,$order,$data);
            $this->ClearCart();
            $massage=array('massage' => 'Your Order Added.','class' => 'alert alert-success fade in');
            $this->session->set_flashdata('massage',$massage);
            redirect('Delivery_person');
        }
    }
}