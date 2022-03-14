<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\M_cdms_status_container;
use App\Models\M_cdms_cost_detail;
use App\Models\M_cdms_container_type;
use App\Models\M_cdms_container;
use App\Models\M_cdms_driver;
use App\Models\M_cdms_agent;
use App\Models\M_cdms_size;
use App\Models\M_cdms_car;
use App\Models\M_cdms_change_container_log;
use App\Models\M_cdms_customer;
use App\Models\M_cdms_service;
use App\Models\M_cdms_status_container_log;
use App\Models\M_cdms_bank;

/*
* Cdms_controller
* main controller
* @author	Wirat
* @Create Date	2564-07-29
*/
class Cdms_controller extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['code'];
	protected $m_size;
	protected $m_cont;
	protected $m_stac;
	protected $m_dri;
    protected $m_car;
	protected $m_con;
	protected $m_cus;
	protected $m_agn;
	protected $m_ser;
	protected $m_chl;
	protected $m_cosd;
	protected $m_bnk;

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
	}

	/*
    * __construct cdms_controller
    * กำหนดค่าเริ่มต้น
    * @input -
    * @output -
    * @author Kittipod
    * @Create Date 2564-03-09
	* @Editor Kittipod
    * @Update Date 2564-03-09
    */

	public function __construct()
    {
		//Start Session
		session_start();

		//Set Time Zone
		date_default_timezone_set("Asia/Bangkok");

		//Load Model
		$this->m_stac = new M_cdms_status_container();
		$this->m_cont = new M_cdms_container_type();
		$this->m_con = new M_cdms_container();
		$this->m_dri = new M_cdms_driver();
		$this->m_agn = new M_cdms_agent();
		$this->m_size = new M_cdms_size();
		$this->m_cus = new M_cdms_customer();
        $this->m_car = new M_cdms_car();
		$this->m_ser = new M_cdms_service();
		$this->m_cosd = new M_cdms_cost_detail();
		$this->m_bnk = new M_cdms_bank();
		$this->m_chl = new M_cdms_change_container_log();
    }

	/*
    * output
    * แสดงหน้าจอ แบบมี Template Header Footer
    * @input -
    * @output แสดงหน้าจอ View พร้อม Header Footer
    * @author Wirat
    * @Create Date 2564-07-28
    * @Update Date 2564-07-28
    */
	public function output($views = '', $data = []) {
		echo view('/template/header', $data);
		echo view($views, $data);
		echo view('/template/footer', $data);
	}
}
