<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 * @author  Mr.Dechachit Kaewmaung 
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */
require(APPPATH.'/libraries/REST_Controller.php');
class Reports extends REST_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('report_model');

    }
    public function drug_allergy_post(){
        
        $cid= $this->input->get('cid');
        echo "CID:".$cid;
        $r = $this->report_model->drug_allergy($cid);
        $this->response($r);
    }
}