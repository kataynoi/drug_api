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

      
        $sql = "CAll getDrugAllergy(".$cid.")";
        //echo $sql;
        $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();
        return $rs;
    }
}
