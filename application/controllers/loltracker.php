<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loltracker extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __contruct(){

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
			log_message( 'debug', 'Configure webserver to handle OPTIONS-request without invoking this script' );
      header( 'Access-Control-Allow-Credentials: true' );
      header( 'Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS' );
      header( 'Access-Control-Allow-Headers: ACCEPT, ORIGIN, X-REQUESTED-WITH, CONTENT-TYPE, AUTHORIZATION' );
      header( 'Access-Control-Max-Age: 86400' );
      header( 'Content-Length: 0' );
      header( 'Content-Type: text/plain' );
			die();
		}

    parent::__construct();
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('pages/champion_mastery');
		$this->load->view('templates/footer');
	}

	public function about(){
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('pages/about');
		$this->load->view('templates/footer');
	}
}
