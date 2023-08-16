<?php

namespace Config;

use App\Controllers\AuthController;
use App\Controllers\Employee as EmployeeController;
use App\Controllers\CrudApiController;
use App\Controllers\Auth\UserController;
use App\Controllers\Auth\AdminController;
use App\Controllers\Auth\EditorController;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function () {
    return view("404");
});
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Development routes
$routes->get('/first-app', function () {
    echo "<h1 align='center' style='color:blue;'>Hello Codeigniter</h1>";
});

// Login & Registration routes
// $routes->match(['get', 'post'], 'register', 'UserController::userRegister', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'register', [AuthController::class, 'userRegister'], ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'login', [AuthController::class, 'userLogin'], ['filter' => 'noauth']);
$routes->get('dashboard', [AuthController::class, 'userDashboard'], ['filter' => 'auth']);
$routes->get('load-employee', [AuthController::class, 'loadEmployee'], ['filter' => 'auth']);
$routes->get('profile', [AuthController::class, 'userProfile'], ['filter' => 'auth']);
$routes->get('logout', [AuthController::class, 'userLogout']);


// Crud Employee routes
$routes->group('serverside', ['filter' => 'auth'], function ($routes) {
    // server side crud
    $routes->match(['get', 'post'], 'add-employee', [EmployeeController::class, 'addEmployee']);
    $routes->match(['get', 'post'], 'edit-employee/(:num)', [EmployeeController::class, 'editEmployee']);
    $routes->get('del-employee/(:num)', [EmployeeController::class, 'deleteEmployee']);

    // client side crud
    $routes->match(['get', 'post'], 'add-post', [EmployeeController::class, 'addPost']);
    $routes->get('fetch-all-post', [EmployeeController::class, 'fetchAllPost']);
    $routes->get('edit-post/(:num)', [EmployeeController::class, 'editPost']);
    $routes->post('update-post', [EmployeeController::class, 'updatePost']);
    $routes->get('delete-post/(:num)', [EmployeeController::class, 'deletePost']);
    $routes->get('detail-post/(:num)', [EmployeeController::class, 'detailPost']);


    // Here are About Images Uploading routes
    $routes->match(['get', 'post'], 'img-uploads', [EmployeeController::class, 'uploadImage'], ['as' => 'img.uploads']);
    //  Server Side DataTable 
    $routes->post("ajax-loadData", [EmployeeController::class, 'ajaxLoadData']);
    // Generate PDF
    $routes->get("generate-pdf", [EmployeeController::class, 'generatePDF'], ['as' => 'generate.pdf']);
    // Read and Write Files
    $routes->get("write-file", [EmployeeController::class, 'readFile']);
    $routes->get("read-file", [EmployeeController::class, 'writeFile']);

    // How to get Local IP Address of System
    $routes->get("get-ip-add", [EmployeeController::class, 'getIpAddress']);

    // Google Line Chart Integration
    $routes->get("charts-integration", [EmployeeController::class, 'chartsIntegration'], ['as' => 'charts.integration']);

    // Download Excel
    $routes->get("download-excel", [EmployeeController::class, 'downloadExcel'], ['as' => 'download.excel']);
    
    // Multi Image & File
    $routes->match(['get','post'],"multi-image", [EmployeeController::class, 'multiImage'], ['as' => 'multi.image']);
    $routes->match(['get','post'],"multi-file", [EmployeeController::class, 'multiFile'], ['as' => 'multi.file']);
});
// Crud Rest API Development
$routes->group('api', function ($routes) {
    $routes->get('fetch', [CrudApiController::class, 'fetch']);
    $routes->post('create', [CrudApiController::class, 'create']);
    $routes->get('show/(:num)', [CrudApiController::class, 'show']);
    $routes->post('update/(:num)', [CrudApiController::class, 'update']);
    $routes->get('delete/(:num)', [CrudApiController::class, 'delete']);
});

//  Multi Auth user Role wise login
$routes->match(['get', 'post'], 'mutli-auth-login', [UserController::class, 'multiAuthLogin'],['as' => 'multi.auth.login'], ['filter' => 'multi-noauth']);
// Admin routes
$routes->group("admin", ["filter" => "multi-auth"], function ($routes) {
    $routes->get("/", [AdminController::class, 'index']);
});
// Editor routes
$routes->group("editor", ["filter" => "multi-auth"], function ($routes) {
    $routes->get("/", [EditorController::class,'index']);
});
$routes->get('auth-logout', [UserController::class, 'authLogout'], ['as' => 'auth.logout']);






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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
