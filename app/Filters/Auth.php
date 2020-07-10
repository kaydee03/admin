<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Libraries\Crud;


class Auth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        // if(! session()->get('isLoggedIn')){
        //   return redirect()->to('/login');
        // }

        // Do something here
        $uri = service('uri');
        
        if(! session()->get('isLoggedIn') && $uri->getSegment(1) != 'login'){
            return redirect()->to('/login');
        }

        if(session()->get('isLoggedIn') && $uri->getSegment(1) == 'login'){
            return redirect()->to('/');
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
