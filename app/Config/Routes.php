<?php

use CodeIgniter\Router\RouteCollection;
use app\Controllers\MemberControll;
use app\Controllers\UsersControll;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use app\Config\AuthFilter;

/**
 * @var RouteCollection $routes
 */

 helper('cookie');
//API routes
$routes->group('API', function ($routes) {
    $routes->get("showMembers", "MemberControll::showMembers");
    $routes->get("deleteMember", "MemberControll::deleteMember");
});


// Admin routes
if(get_cookie("login")){
    $routes->group("admin",  function($routes){

        try {
            $routes->get("test", function(){
                return view('/admin/records');
            });
        
            $routes->get("testing", function(){
                return view('/admin/records');
            },['as'=>'memberForm']);

            $routes->get('logout',"UsersControll::logout");
            
        
            $routes->post("addMember","MemberControll::addMember");
        } catch (\Throwable $th) {
            echo $th;
        }
    });
    $session = session();
    $session->set(
        ['userID' => get_cookie('login')]
    );
}



$routes->post("login", "UsersControll::login");

$routes->get('/', function () {
    try {
        
        if (get_cookie('login')) {
            return redirect()->to('admin/testing');
        } else {
         return view("index");
        }
    } catch (\Throwable $th) {
        echo $th;
    }
});





