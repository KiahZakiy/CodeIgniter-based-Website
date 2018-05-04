<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	    {
	        // this is your constructor
	        parent::__construct();
	        $this->load->helper('form');
	        $this->load->helper('url');
	    }

	/**

	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function Insert()
	{

		if(isset($_POST['add'])) {

        	$this -> load -> database();
			  	$dataInput = array('FilmID'=> $this ->input->post('FilmID'),
		                	'FilmName'=> $this ->input->post('FilmName'),
		                  'FilmReleaseDate' =>$this ->input->post('FilmReleaseDate'),
											'FilmDirectorID' =>$this ->input->post('FilmDirectorID'),
											'FilmLanguageID' =>$this ->input->post('FilmLanguageID'),
											'FilmCountryID' =>$this ->input->post('FilmCountryID'),
											'FilmStudioID' =>$this ->input->post('FilmStudioID'),
											'FilmSynopsis' =>$this ->input->post('FilmSynopsis'));
                       $this->db->insert('tblfilm',$dataInput);
											 redirect('Welcome/Show');
				}

		$this -> load -> view('Insert');
	}


	public function Delete($id = NULL)

	{
	$this -> load -> database();
  $this->db->where('FilmID',$id);
  $this->db->delete('tblfilm');
						 redirect('Welcome/Show');

  }

	public function Show()
	{
		$this -> load -> database();
	  $data['tblfilm'] =	$this->db->get('tblfilm')->result();
		$this->load->view('view',$data);
	}

}
