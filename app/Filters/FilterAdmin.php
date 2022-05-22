<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if( session()->id_level == '' ) {
            return redirect()->to(base_url('/masuk'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if( session()->id_level == 1 ) {
            return redirect()->to('/administrator');
        }
    }
}