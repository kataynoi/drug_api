<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model

{

    public function read(){
        $rs = $this->db
            ->get('yy')
            ->result();
        return $rs ;

    }
    public function do_auth($username, $password)
    {
        $rs = $this->db
            ->select('a.id,a.prename,a.name,a.position,a.hospcode,b.hosname')
            ->where('a.username', $username)
            ->where('a.password', "PASSWORD('$password')", false)
            ->join('chospital b','a.hospcode = b.hoscode')
            ->get('mas_users a')
            ->row_array();
        //echo $this->db->last_query();
        return $rs;
    }
    public function get_userprofile($id){
        $rs = $this->db
            ->where('id',$id)
            ->get('mas_users')
            ->row_array();
        return $rs;
    }
    public function save_user($data)
    {
        $rs = $this->db
            ->set('prename',$data['prename'])
            ->set('name',$data['name'])
            ->set('cid',$data['cid'])
            ->set('username', $data['username'])
            ->set('hospcode', $data['hospcode'])
            ->set('group', $data['group'])
            ->set('employee_type', $data['employee_type'])
            ->set('email', $data['email'])
            ->set('position', $data['position'])
            ->set('user_mobile', $data['user_mobile'])
            ->insert('mas_users');
        return $rs;
    }
    public function update_user($data)
    {
        $rs = $this->db
            ->where('id',$data['id'])
            ->set('prename',$data['prename'])
            ->set('name',$data['name'])
            ->set('cid',$data['cid'])
            ->set('username', $data['username'])
            ->set('hospcode', $data['hospcode'])
            ->set('group', $data['group'])
            ->set('employee_type', $data['employee_type'])
            ->set('email', $data['email'])
            ->set('position', $data['position'])
            ->set('user_mobile', $data['user_mobile'])
            ->update('mas_users');
        return $rs;
    }
    public function update_password($data)
    {
        $rs = $this->db
            ->where('id',$data['id'])
            ->set('password', "PASSWORD('".$data['password']."')", false)
            ->update('mas_users');
        return $rs;
    }
    public function get_member_name($id){
        $rs = $this->db
            ->where('id',$id)
            ->get('mas_users')
            ->result();
        return $rs? $rs->prename.$rs->name:'-';
    }

}