<?php
class My_model extends CI_Model {

 public function fetchcategotybyid($cid) {
        $query = $this->db->query("select * from category where cat_parent_id=$cid  AND cat_status=1 AND cat_delete_status=0 ");
        return $query->result();
    }
	}