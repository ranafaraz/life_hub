<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		// Load the database library
		$this->load->database();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	// Method to test database connectivity
	public function test_db() {
		// Perform a simple query to check the connection
		$query = $this->db->query("SELECT DATABASE() AS db_name");

		// Check if the query executed successfully
		if ($query) {
			// Fetch the result as an array
			$result = $query->row_array();
			// Display the name of the connected database
			echo "Connected to database: " . $result['db_name'];
		} else {
			// Display an error message if the query fails
			echo "Failed to connect to the database.";
		}
	}

	public function file_upload(){
		$CI =& get_instance();
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$file = $_FILES["college_file"]["tmp_name"]; // getting temporary source of excel file
			require 'application/third_party/PHPExcel/IOFactory.php';
			$objPHPExcel = PHPExcel_IOFactory::load($file);
			$data = [];
			foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				if('UserType' == $worksheet->getCellByColumnAndRow(0, 1)->getValue() &&
					'First Name' == $worksheet->getCellByColumnAndRow(1, 1)->getValue() &&
					'Last Name' == $worksheet->getCellByColumnAndRow(2, 1)->getValue() &&
					'Username' == $worksheet->getCellByColumnAndRow(3, 1)->getValue() &&
					'Date Of Birth' == $worksheet->getCellByColumnAndRow(4, 1)->getValue() &&
					'Organization Name' == $worksheet->getCellByColumnAndRow(5, 1)->getValue() &&
					'Class' == $worksheet->getCellByColumnAndRow(6, 1)->getValue() &&
					'Budget' == $worksheet->getCellByColumnAndRow(7, 1)->getValue() &&
					'Educator Email' == $worksheet->getCellByColumnAndRow(8, 1)->getValue()){
					for($row=2; $row<=$highestRow; $row++)
					{
						if(!empty($worksheet->getCellByColumnAndRow(0, $row)->getValue())){
							$data[] = [
								'user_type' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
								'user_firstname' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
								'user_lastname' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
								'username' => $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
								'dob' => $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
								'org_name' => $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
								'class' => $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
								'budget' => $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
								'educator_mail' => $worksheet->getCellByColumnAndRow(8, $row)->getValue()
							];
						}
					}
					if(!empty($data)){
						if($this->db->insert_batch('educator_users', $data)){

						}else{
		     				echo "Something went wrong. Please try again.";die();
						}
					}
				}else{
					echo "Columns name or order changed, Download sample file again and then upload it.";die();
				}
			}
			redirect('file_upload');
		}
		$record['userdata'] = $this->db->query("SELECT * FROM educator_users")->result_array();
		$this->load->view('import_users',$record);
	}
}
