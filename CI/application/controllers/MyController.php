<?php
class MyController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users');
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function store()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|alpha_dash|min_length[5]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password' ,'required|matches[password]');
		if($this->form_validation->run() ==  false) {
			echo validation_errors();
		}else{
			$password = hash('md5',$this->input->post('password') );
			$this->load->database();
			$data = array(
				'name' 	=>$this->input->post('name') ,
				'phone' =>$this->input->post('phone') ,
				'email' =>$this->input->post('email') ,
				'password' =>$password
			);
			$this->db->insert('users', $data);
			echo "Created!";
            //$this->load->view('login');
		}
	}

	public function edit($id)
	{
		$this->load->model('users');
		$user = $this->users->showUser($id);
		$this->load->view('edit.php',$user);
	}

	public function update($id)
	{
		$this->load->database();
		$data = array(
			'name' 	=>$this->input->post('name') ,
			'phone' =>$this->input->post('phone') ,
			'email' =>$this->input->post('email') , 
		);
		$this->db->set($data);
		$this->db->where('id',$id);
		$status = $this->db->update('users');
		if ($status) {
			echo "Update success!";
		}else{
			echo "Update failed!";
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|alpha_dash');
		if($this->form_validation->run() ==  false){
			$this->index();
		}else{
			$email = $this->input->post('email');
			$password = hash('md5', $this->input->post('password'));
			$this->load->database();
			$this->load->model('users');
			$user = $this->users->userLogin($email,$password);
			if ($user == 0) {
				echo "Login failed. Email or password is not correct!";
			}else{
				echo "Login success!";
			}
		}
	}

	public function delete($id)
	{
		$this->load->model('users');
		$status = $this->users->delete($id);
		if($status) {
			echo "Deleted!";
		}
		else{
			echo "Delete Failed!";
		}
	}
	public function listUser()
	{
		$this->load->view('list',array( ));
	}

	public function users()
	{
		$limit = $_POST['length'];
		$offset = $_POST['start']; 
		$users = $this->users->getList();
		$data = array();
		foreach($users as $user)
		{
			$row = array();
			$row[] = $user->id;
			$row[] = $user->email;
			$row[] = $user->name;
			$acc = '<a href="/CI/index.php/MyController/delete/'.$user->id.'" class="btn btn-primary">Detele</a>';
			$acc .= '<a href="/CI/index.php/MyController/edit/'.$user->id.'" class="btn btn-primary">Edit</a>';
			$row[] = $acc;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->users->count_all(),
			"recordsFiltered" => $this->users->count_all(),
			"data" => $data,
		);
		echo json_encode($output);
	}
}
