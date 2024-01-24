<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthStudent implements FilterInterface
{
    //This function is a condition before going to next page
    public function before(RequestInterface $request, $arguments = null)
    {
        //Checks if the user is not logged in as student, and it redirects the user to login page if true
        if( session()->get('loggedInAs') != 'student')
        {
            //base_url() is the root url eg. http/localhost/lopez_ci
            return redirect()->to(base_url());
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}