<?php
class Admin_model extends CI_Model {



       /**
     * For use Insert data 
     * pass table name and data
    */
    public function insertAll($table, $data) {
        
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id > 0) {
            return $insert_id;
        } else {
            return false;
        }
	}

   
    //End function

	/**
	 * For Fetch trainer category
	 * pass table name and data
	 */
	public function fetch_category()
	{
		$this->db->order_by("cat_id", "desc");
		$query = $this->db->get('category');
		return $query->result();
	}
	//End function


   

    //count coutnry row for pagination
    public function get_count() 
	{
        $where  = array('country_delete_status'=>0,'country_status' =>1,'country_parent_id'=>''); 
        $this->db->where($where);
        $query = $this->db->get('country');
        return count($query->result());
    }

    //End

    //count coutry wise university for pagination
    
    public function get_count_Countrywise_uni($un_id)
    {
        
        $where  = array('un_delete_status' =>0,'category'=>2,'un_status' =>1,'un_public_status' =>0,'un_country'=>$un_id); 
        $this->db->where($where);
        $query = $this->db->get('university');
        return count($query->result());
    }

    //End


    function is_data_exists($table, $where){
        $this->db->from($table);
        $this->db->where($where);
        $query      = $this->db->get();
        $rowcount   = $query->num_rows();
        if($rowcount==0){
            return FALSE; //record not found
        }else{
            return $query->row(); //return record if found (In preveious versions, this use to return TRUE(bool) only)
        }
    }//End function


 /* UPDATE RECORD FROM SINGLE TABLE */
    function updateFields($table, $data, $where){
        $update = $this->db->update($table, $data, $where);
    //    if($this->db->affected_rows() > 0){
        if($update){
            return true;
        }else{
            return false;
        }
    }//end function
    
        function newsendMemberMail($useremail,$subject,$message)
            {
                $this->load->library('email');
                $config = array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'email-smtp.us-east-2.amazonaws.com',
                    'smtp_port' => 587,
                    'smtp_user' => 'sachinvish07@gmail.com',
                    'smtp_pass' => '9009796860',
                    'smtp_crypto' => 'tls',
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                );

                $this->email->initialize($config);
                $this->load->library('email');
                $this->email->from('sachinvish07@gmail.com','Bild It');
                $this->email->to($useremail);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->set_mailtype("html");
                $this->email->send();
            } //End function



    //for get single data
    public  function getsingle($table, $where = '', $fld = NULL, $order_by = '', $order = '') {
        if ($fld != NULL) {
            $this->db->select($fld);
        }
        $this->db->limit(1);

        if ($order_by != '') {
            $this->db->order_by($order_by, $order);
        }
        if ($where != '') {
            $this->db->where($where);
        }

        $q = $this->db->get($table);
        return $q->row_array();
    } 

    //End function

   
    /**
     * For count data
     * pass table name and data
    */
	
	public function get_total_count($table, $where=''){
        $this->db->from($table);
        if(!empty($where))
            $this->db->where($where);
        
        $query = $this->db->get();
        return $query->num_rows(); //total records
    }    

    /**
     * For count data
     * pass table name and data
    */
    
    public function update($table, $data, $where) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //End function

    /**
     * For count data
     * pass table name and data
    */
    
    public function admin_login($email, $password) {
        $query = $this->db->query("select * from admin where admin_email='$email' && admin_password='$password' && admin_status='1' && admin_delete='0' ");
        return $query->result();
    }

    public function admin_changepas($password) {
       
        $query = $this->db->query("select * from admin where admin_password='$password'");
        return $query->result();
    }

    /**
     * For fetch trainer
    */


 /* GET MULTIPLE RECORD 
     * Modified in ver 2.0
     */
     function getAll($table, $where = '', $order_fld = '', $order_type = '', $select = 'all', $limit = '', $offset = '', $group_by='', $like='') {
        $data = array();
        if ($select == 'all') {
            $this->db->select('*');
        } else {
            $this->db->select($select);
        }
        if($group_by !=''){
            $this->db->group_by($group_by);
        }
        $this->db->from($table);
        if ($where != '') {
            $this->db->where($where);
        }
        if ($like != '') {
            $this->db->like('name', $like);
        }
        if ($limit != '' && $offset != '') {
            $this->db->limit($limit,$offset);
        } else if ($limit != '') {
            $this->db->limit($limit);
        }
        if ($order_fld != '' && $order_type != '') {
            $this->db->order_by($order_fld, $order_type);
        }
        $q = $this->db->get();
        
        return $q->result(); //return multiple records
    }//end function



    var $table = 'country';
    var $column_order = array(null, 'country_name'); //set column field database for datatable orderable
    var $column_search = array('country_name'); //set column field database for datatable searchable 
    var $order = array('country_id' => 'desc'); // default order 
 
       
 
    
 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
         $where = array('country_delete_status' =>0);
         $this->db->where($where); 
         $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();

         $where = array('country_delete_status' =>0);
         $this->db->where($where); 
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {   
         $where = array('country_delete_status' =>0);
         $this->db->where($where); 
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function asDollars($value) {
        if ($value<0) return "-".asDollars(-$value);
        echo '$' . number_format($value, 2);
      }
    

      //-----adminlist-----//

	var $admin_table = 'admin';
	var $column_order_admin = array(null, 'admin_name'); //set column field database for datatable orderable
	var $column_search_admin = array('admin_name'); //set column field database for datatable searchable 
	var $order_admin = array('admin_id' => 'desc'); // default order 

	private function _get_admin_datatables_query()
	{

		$this->db->from($this->admin_table);

		$i = 0;

		foreach ($this->column_search_admin as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search_admin) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_admin[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order_admin)) {
			$order = $this->order_admin;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_admin_datatables()
	{
		$this->_get_admin_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$where = array('admin_delete' => 0,'admin_id!='=>1);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function count_admin_filtered()
	{
		$this->_get_admin_datatables_query();

		$where = array('admin_delete' => 0,'admin_id!='=>1);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_admin_all()
	{
		$where = array('admin_delete' => 0,'admin_id!='=>1);
		$this->db->where($where);
		$this->db->from($this->admin_table);
		return $this->db->count_all_results();
	}

	//-----admin End-----//
//fetch coutnry by id
    public function fetchcountryid($id)
    {
        $query=$this->db->query("select  * from country where country_id=$id ");
        return $query->result();
    }
    //get state data

 public function get_statelist()
    {
       $query=$this->db->query("select state.*,country.* from state INNER JOIN country  ON 
        state.state_country_id=country.country_id order by state.state_id desc");
        return $query->result();
    }

	}