<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronfile  {
    var $CI;
    
    public function __construct(){
        // parent::__construct();
        $this->CI =& get_instance();
            // Loading my model which will use
            // $this->load->model('user_model', 'user');  
            // imedate database link
            
            // $this->CI->load->library('database');
            $this->CI->load->database();    
         


        }
      
        public function index_event(){
            $sqli1="UPDATE `Ilab_master_buyer_MR` SET `Ilab_master_buyer_MR`.`complete_status_bid`='1' WHERE `Ilab_master_buyer_MR`.`Mr_id`IN (SELECT `Ilab_master_bid_commerical`.`mr_no` FROM `Ilab_master_bid_commerical` WHERE `Ilab_master_bid_commerical`.`status_bid`='6')";
            $query1 = $this->CI->db->query($sqli1);
            $sqli2="UPDATE `Ilab_master_buyer_MR` SET `Ilab_master_buyer_MR`.`Technical_process_status`='1' WHERE `Ilab_master_buyer_MR`.`Mr_id`IN (SELECT `Ilab_master_bid`.`mr_no` FROM `Ilab_master_bid` WHERE `Ilab_master_bid`.`status_bid`='6')";
            $query2 = $this->CI->db->query($sqli2);
            $sqli3="UPDATE `Ilab_master_buyer_MR` SET `Ilab_master_buyer_MR`.`Technical_process_status`='1' WHERE `Ilab_master_buyer_MR`.`Mr_id`IN (SELECT `Ilab_master_bid`.`mr_no` FROM `Ilab_master_bid` WHERE `Ilab_master_bid`.`status_bid`='6')";
            $query3 = $this->CI->db->query($sqli3);
            $sqli4="UPDATE `Ilab_master_buyer_MR` SET `Ilab_master_buyer_MR`.`complete_status_bid`='1' WHERE `Ilab_master_buyer_MR`.`Mr_id`IN (SELECT `Ilab_master_bid_commerical`.`mr_no` FROM `Ilab_master_bid_commerical` WHERE `Ilab_master_bid_commerical`.`status_bid`='6')";
            $query4 = $this->CI->db->query($sqli4);
            $sqli5="UPDATE `Ilab_master_bid_vendor` SET `Ilab_master_bid_vendor`.`status_active`='6' WHERE `Ilab_master_bid_vendor`.`mr_no`IN (SELECT `Ilab_master_bid`.`mr_no` FROM `Ilab_master_bid` WHERE `Ilab_master_bid`.`status_bid`='6')";
            $query5 = $this->CI->db->query($sqli5);
            $sqli6="UPDATE `Ilab_master_bid_vendor_commerical` SET `Ilab_master_bid_vendor_commerical`.`status_active`='6' WHERE `Ilab_master_bid_vendor_commerical`.`mr_no`IN (SELECT `Ilab_master_bid_commerical`.`mr_no` FROM `Ilab_master_bid_commerical` WHERE `Ilab_master_bid_commerical`.`status_bid`='6')";
            $query6 = $this->CI->db->query($sqli6);

        }

    }