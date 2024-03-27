<?php

// app/Filters/AuthFilter.php

namespace App;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
{
    helper('cookie');
    if (get_cookie('remember_me')) {
       // return redirect()->to('/login');
    }

    return $request;
}

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing after the request is processed
    }
}



?>