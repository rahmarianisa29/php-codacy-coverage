	public function getlogin()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->load->model('model_login');
		$query = $this->model_login->getlogin($u,$p);
		if($query->num_rows()==1)
		{
			$row = $query->row();
			$sess = array('username' 	    => $row->username,
						  'nama_lengkap' 	=> $row->nama_lengkap,
		   				  'jabatan' 		=> $row->jabatan,
		   				  'id_kecamatan' 	=> $row->id_kecamatan,
		   				  'nama_kecamatan' 	=> $row->nama_kecamatan,
						  'foto' 			=> $row->foto );
			$this->session->set_userdata($sess);
			redirect('backend/home');
		} else {
			$this->session->set_flashdata('info','maaf username atau password salah');
			redirect('login');
		}
	}
