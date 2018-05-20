<?php 
class Users extends CI_Model {
    var $column_search = ['id', 'email', 'name'];
    var $column_order = array('id', 'email', 'name');
    var $order = array('id' => 'asc');
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->from('users');
        $i = 0;
        foreach ($this->column_search as $item)
        {
            if($_POST['search']['value'])
            {

                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
                }
                $i++;
            }

        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function showList()
    {
       $this->db->select(['id', 'name', 'email']);
       $users = $this->db->get('users')->result_array();
       return $users;
   }

   public function showUser($id)
   {
       $this->db->where('id',$id);
       $user = $this->db->get('users')->row();
       return $user;
   }

   public function userLogin($email,$password)
   {
       $this->db->select(['email','password']);
       $this->db->where('email',$email);
       $this->db->where('password',$password);
       $user = $this->db->get('users')->num_rows();
       return $user;
   }

   public function delete($id)
   {
        $this->load->database();
        $this->db->where('id',$id);
        $status = $this->db->delete('users');
        return $status;
    }

    public function getList()
    {   
        $this->_get_datatables_query();
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        return $this->db->count_all_results('users');
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->num_rows();
    }
}

