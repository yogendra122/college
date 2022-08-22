<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Accomodation_model extends CI_model
{


    var $table = 'university';
    var $column_order = array(null, 'un_name', 'un_id', 'room_type'); //set column field database for datatable orderable
    var $column_search = array('un_name', 'un_address', 'acc_room_type', 'room_type'); //set column field database for datatable searchable 
    var $order = array('un_id' => 'desc'); // default order 

    private function _get_datatables_query($term = '')
    {


        
  
        $this->db->select('university.*', 'acco_room_type.*');
        $this->db->from('university');
        $this->db->join('acco_room_type', 'acco_room_type.id = university.acc_room_type', 'left');
        $this->db->group_start();
        $this->db->or_like('university.un_address', $term);
        $this->db->or_like('university.category', $term);
        $this->db->or_like('acco_room_type.room_type', $term);
        $this->db->or_like('university.acc_rent', $term);
        $this->db->group_end();

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        // $this->db->from($this->table);

        // $i = 0;

        // foreach ($this->column_search as $item) // loop column 
        // {
        //     if($_POST['search']['value']) // if datatable send POST for search
        //     {

        //         if($i===0) // first loop
        //         {
        //             $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
        //             $this->db->like($item, $_POST['search']['value']);
        //         }
        //         else
        //         {
        //             $this->db->or_like($item, $_POST['search']['value']);
        //         }

        //         if(count($this->column_search) - 1 == $i) //last loop
        //             $this->db->group_end(); //close bracket
        //     }
        //     $i++;
        // }

        // if(isset($_POST['order'])) // here order processing
        // {
        //     $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        // } 
        // else if(isset($this->order))
        // {
        //     $order = $this->order;
        //     $this->db->order_by(key($order), $order[key($order)]);
        // }
    }

    function get_datatables()
    {
        $term = $_REQUEST['search']['value'];
        $this->_get_datatables_query($term);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $where = array('un_delete_status' => 0,'category' => 3);
        $this->db->where($where);
        $query = $this->db->get();
      
    
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();

        $where = array('un_delete_status' => 0, 'category' => 3);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $where = array('un_delete_status' => 0, 'category' => 3);
        $this->db->where($where);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}//End Class
