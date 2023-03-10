<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Report model
 *
 * @author  Mr.Dechachit Kaewmaung
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */
class Report_model extends CI_Model
{
   
    public function drug_allergy($cid)
    {
        $hdc = $this->load->database('hdc', TRUE);
        $sql = "CAll getDrugAllergy(".$cid.")";
        $rs = $hdc->query($sql)->result();
        return $rs;
    }
}
