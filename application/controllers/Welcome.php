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
}
