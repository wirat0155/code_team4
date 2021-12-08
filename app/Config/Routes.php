<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('dashboard_show');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('dashboard', 'Dashboard::index');
$routes->get('member', 'Member::index');
$routes->get('delete_member', 'Member::delete');
$routes->get('delete_member/(:num)', 'Member::delete/$1');
$routes->get('customer', 'Customer_show::customer_show_ajax');
$routes->get('/Dashboard/dashboard_show', 'Dashboard::dashboard_show', ['filter' => 'auth']);
$routes->get('/Service_show/service_show_ajax', 'Service_show::service_show_ajax', ['filter' => 'auth']);
$routes->get('/Service_input/service_input', 'Service_input::service_input', ['filter' => 'auth']);
$routes->get('/Customer_show/customer_show_ajax', 'Customer_show::customer_show_ajax', ['filter' => 'auth']);
$routes->get('/Customer_input/customer_input', 'Customer_input::customer_input', ['filter' => 'auth']);
$routes->get('/Agent_show/agent_show_ajax', 'Agent_show::agent_show_ajax', ['filter' => 'auth']);
$routes->get('/Agent_input/agent_input', 'Agent_input::agent_input', ['filter' => 'auth']);
$routes->get('/Container_show/container_show_ajax', 'Container_show::container_show_ajax', ['filter' => 'auth']);
$routes->get('/Container_input/container_input', 'Container_input::container_input', ['filter' => 'auth']);
$routes->get('/Driver_show/driver_show_ajax', 'Driver_show::driver_show_ajax', ['filter' => 'auth']);
$routes->get('/Driver_input/driver_input', 'Driver_input::driver_input', ['filter' => 'auth']);
$routes->get('/Car_show/car_show_ajax', 'Car_show::car_show_ajax', ['filter' => 'auth']);
$routes->get('/Car_input/car_input', 'Car_input::car_input', ['filter' => 'auth']);
$routes->get('/Set_up/set_up_show', 'Set_up::set_up_show', ['filter' => 'auth']);
$routes->get('/Set_up_container_type/container_type_show', 'Set_up_container_type::container_type_show', ['filter' => 'auth']);
$routes->get('/Set_up_status_container/status_container_show', 'Set_up_status_container::status_container_show', ['filter' => 'auth']);
$routes->get('/Set_up_size/size_show', 'Set_up_size::size_show', ['filter' => 'auth']);
$routes->get('/Set_up_car_type/car_type_show', 'Set_up_car_type::car_type_show', ['filter' => 'auth']);
$routes->get('/Service_edit/service_edit', 'Service_edit::service_edit', ['filter' => 'auth']);
$routes->get('/Customer_show/customer_detail', 'Customer_show::customer_detail', ['filter' => 'auth']);
$routes->get('/Service_show/service_detail', 'Service_show::service_detail', ['filter' => 'auth']);
$routes->get('/Customer_edit/customer_edit', 'Customer_edit::customer_edit', ['filter' => 'auth']);
$routes->get('/Agent_show/agent_detail', 'Agent_show::agent_detail', ['filter' => 'auth']);
$routes->get('/Agent_edit/agent_edit', 'Agent_edit::agent_edit', ['filter' => 'auth']);
$routes->get('/Container_show/container_detail', 'Container_show::container_detail', ['filter' => 'auth']);
$routes->get('/Container_edit/container_edit', 'Container_edit::container_edit', ['filter' => 'auth']);
$routes->get('/Driver_show/driver_detail', 'Driver_show::driver_detail', ['filter' => 'auth']);
$routes->get('/Driver_edit/driver_edit', 'Driver_edit::driver_edit', ['filter' => 'auth']);
$routes->get('/Car_show/car_detail', 'Car_show::car_detail', ['filter' => 'auth']);
$routes->get('/Car_edit/car_edit', 'Car_edit::car_edit', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}