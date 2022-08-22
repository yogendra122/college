<?php
class User_model extends CI_Model
{



	//user register model
	function registration($user)
	{
		$checkEmail = $this->db->select('*')->where(array('user_email' => $user['user_email']))->get('users');
		if ($checkEmail->num_rows()) {
			return array('regType' => 'AE'); //already exist
		} else {
			$this->db->insert('users', $user);
			$lastId = $this->db->insert_id();
			if ($lastId) :
				return array('regType' => 'NR', 'returnData' => $this->userInfo(array('user_id' => $lastId)));
			// Normal registration
			endif;
		}
		return false;
	}

	//End Function users Register

	//user register model
	function registration_admin($user)
	{
		$checkEmail = $this->db->select('*')->where(array('admin_email' => $user['admin_email']))->get('admin');
		if ($checkEmail->num_rows()) {
			return array('regType' => 'AE'); //already exist
		} else {
			$this->db->insert('admin', $user);
			$lastId = $this->db->insert_id();
			if ($lastId) :
				return array('regType' => 'NR', 'returnData' => $this->userInfo(array('user_id' => $lastId)));
			// Normal registration
			endif;
		}
		return false;
	}

	//End Function users Register


	// dynamic city country list

	function fetch_country()
	{
		$this->db->order_by("name", "ASC");
		$query = $this->db->get("countries");
		return $query->result();
	}

	function fetch_state($country_id)
	{
	 $this->db->where('country_id', $country_id);
	 $this->db->order_by('name', 'ASC');
	 $query = $this->db->get('states');
	 $output = '<option value="">Select State</option>';
	 foreach($query->result() as $row)
	 {
	  $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
	 }
	 return $output;
	}


	function fetch_city($state_id)
	{
	 $this->db->where('state_id', $state_id);
	 $this->db->order_by('name', 'ASC');
	 $query = $this->db->get('cities');
	 $output = '<option value="">Select City</option>';
	 foreach($query->result() as $row)
	 {
	  $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
	 }
	 return $output;
	}
   

  // dynamic city country list End

	//login model
	function login($data)
	{
		$res = $this->db->select('*')->where(array('user_email' => $data['user_email'], 'user_status' => 1))->get('users');
		if ($res->num_rows()) {
			$result = $res->row();
			if (password_verify($data['user_password'], $result->user_password)) {
				$userInfo = $this->db->get_where('users', array('user_id' => $result->user_id))->result();
				return array('returnType' => 'SL', 'userInfo' => $userInfo[0]);
			} else {
				return array('returnType' => 'WP'); // Wrong Password
			}
		} else {
			return array('returnType' => 'WE'); // Wrong Email
		}
	} //End users Login

	//login model
	function sociallogin($data)
	{
		$res = $this->db->select('*')->where(array('user_email' => $data['user_email'], 'user_status' => 1))->get('users');
		if ($res->num_rows()) {
			$result = $res->row();
		
				$userInfo = $this->db->get_where('users', array('user_id' => $result->user_id))->result();
				return array('returnType' => 'SL', 'userInfo' => $userInfo[0]);
			
		} else {
			return array('returnType' => 'WE'); // Wrong Email
		}
	} //End users Login


	//get user info
	function userInfo($where)
	{

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($where);
		$sql = $this->db->get();

		if ($sql->num_rows()) :
			return $sql->row();
		endif;
		return false;
	} //end function


	//for get single data
	public  function getsingle($table, $where = '', $fld = NULL, $order_by = '', $order = '')
	{
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

	/* UPDATE RECORD FROM SINGLE TABLE */
	function updateFields($table, $data, $where)
	{
		$update = $this->db->update($table, $data, $where);
		//    if($this->db->affected_rows() > 0){
		if ($update) {
			return true;
		} else {
			return false;
		}
	} //end function

	//user forgot password  
	function forgotPassword($email)
	{

		$sql = $this->db->select('user_id,user_name,user_secret_id,user_email,user_password')->where(array('user_email' => $email))->get('users');

		if ($sql->num_rows()) {
			$result             = $sql->row();
			$useremail          = $result->user_email;
			$user_secret_id          = $result->user_secret_id;
			$data['name']  = $result->user_name;
			$encoding_email     = base64_encode($useremail);
			$data['url']        = base_url() . 'change_password/' . $user_secret_id;
			$this->load->model('Admin_model');
			$message            = $this->load->view('email_forgot_view', $data, TRUE);
			$subject            = "Forgot Password";


			$this->load->library('email');
			$config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'smtp.googlemail.com',
				'smtp_port' => 587,
				'smtp_user' => 'sachinvish07@gmail.com',
				'smtp_pass' => '',
				'smtp_crypto' => 'tls',
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
			);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->to('sachinvish07@gmail.com');
			$this->email->from('sachinvish07@gmail.com', 'Bild It');
			$this->email->subject($subject);
			$this->email->message($message);
			$response = $this->email->send();

			if ($response) {
				return  array('emailType' => 'ES'); //ES emailSend
			} else {
				return  array('emailType' => 'NS'); //NS NotSend
			}
		} else {
			return  array('emailType' => 'NE'); //NE Not exist
		}
	} //End funtion  


	//-----userlist-----//

	var $table = 'users';
	var $column_order = array(null, 'user_name'); //set column field database for datatable orderable
	var $column_search = array('user_name'); //set column field database for datatable searchable 
	var $order = array('user_id' => 'desc'); // default order 

	private function _get_datatables_query()
	{

		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
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

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$where = array('user_delete_status' => 0);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();

		$where = array('user_delete_status' => 0);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$where = array('user_delete_status' => 0);
		$this->db->where($where);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	//-----userlist End-----//




	



	//-----Inquiry user list-----//

	var $Intable = 'user_inquiry';
	var $Incolumn_order = array(null, 'in_categories', 'in_message'); //set column field database for datatable orderable
	var $Incolumn_search = array('in_categories', 'in_message'); //set column field database for datatable searchable 
	var $Inorder = array('in_id' => 'desc'); // default order 

	private function In_get_datatables_query()
	{

		$this->db->from($this->Intable);

		$i = 0;

		foreach ($this->Incolumn_search as $item) // loop column 
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

				if (count($this->Incolumn_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->Incolumn_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->Inorder)) {
			$order = $this->Inorder;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function Inget_datatables()
	{
		$this->In_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$where = array('in_deletestatus' => 0);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function Incount_filtered()
	{
		$this->In_get_datatables_query();

		$where = array('in_deletestatus' => 0);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function Incount_all()
	{
		$where = array('in_deletestatus' => 0);
		$this->db->where($where);
		$this->db->from($this->Intable);
		return $this->db->count_all_results();
	}

	//-----inquiry End-----//

	//-----category  list-----//

	var $cattable = 'category';
	var $catcolumn_order = array(null, 'cat_name'); //set column field database for datatable orderable
	var $catcolumn_search = array('cat_name'); //set column field database for datatable searchable 
	var $catorder = array('cat_id' => 'desc'); // default order 

	private function cat_get_datatables_query()
	{

		$this->db->from($this->cattable);

		$i = 0;

		foreach ($this->catcolumn_search as $item) // loop column 
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

				if (count($this->catcolumn_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->catcolumn_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->catorder)) {
			$order = $this->catorder;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function catget_datatables()
	{
		$this->cat_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$where = array('cat_delete_status' => 0);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function catcount_filtered()
	{
		$this->cat_get_datatables_query();

		$where = array('cat_delete_status' => 0);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function catcount_all()
	{
		$where = array('cat_delete_status' => 0);
		$this->db->where($where);
		$this->db->from($this->cattable);
		return $this->db->count_all_results();
	}

	//-----category End-----//

	//-----Review user list-----//

	var $Reviewtable = 'rating';
	var $Reivewcolumn_order = array(null, 'rat_comment'); //set column field database for datatable orderable
	var $Reviewcolumn_search = array('rat_comment', 'rat_id'); //set column field database for datatable searchable 
	var $Reviewnorder = array('rat_id' => 'desc'); // default order 

	private function Review_get_datatables_query($term = '')
	{


		$column = array('rating.*', 'users.user_id', 'users.user_name');
		$this->db->select('rating.*', 'users.user_id', 'users.user_name');
		$this->db->from('rating');
		$this->db->join('users', 'users.user_id = rating.rat_userid', 'left');
		$this->db->join('university', 'university.un_id = rating.rat_university_id', 'left');
		$this->db->group_start();
		$this->db->or_like('rating.rat_comment', $term);
		$this->db->or_like('users.user_name', $term);
		$this->db->or_like('university.un_name', $term);
		$this->db->group_end();
		if (isset($_REQUEST['order'])) // here order processing
		{
			$this->db->order_by($Reivewcolumn_order[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
		} else if (isset($this->Reviewnorder)) {
			$order = $this->Reviewnorder;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function Review_get_datatables()

	{
		$term = $_REQUEST['search']['value'];
		$this->Review_get_datatables_query($term);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$where = array('rat_delete' => 0);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function Reviewcount_filtered()
	{
		$this->Review_get_datatables_query();

		$where = array('rat_delete' => 0);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function Reviewcount_all()
	{
		$where = array('rat_delete' => 0);
		$this->db->where($where);
		$this->db->from($this->Reviewtable);
		return $this->db->count_all_results();
	}

	//-----Review End-----//


	//-----category  list-----//

	var $lantable = 'tbl_constant';
	var $lancolumn_order = array(null, 'constantName'); //set column field database for datatable orderable
	var $lancolumn_search = array('constantName'); //set column field database for datatable searchable 
	var $lanorder = array('id' => 'desc'); // default order 

	private function lan_get_datatables_query()
	{

		$this->db->from($this->lantable);

		$i = 0;

		foreach ($this->lancolumn_search as $item) // loop column 
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

				if (count($this->lancolumn_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->lancolumn_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->lanorder)) {
			$order = $this->lanorder;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function language_get_datatables()
	{
		$this->lan_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$where = array('status' => 'active');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	public function lancount_all()
	{
		$where = array('status' => 'active');
		$this->db->where($where);
		$this->db->from($this->lantable);
		return $this->db->count_all_results();
	}

	
	function lancount_filtered()
	{
		$this->lan_get_datatables_query();

		$where = array('status' => 'active');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}


}//End class
