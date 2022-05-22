<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterResepsionis implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if( session()->id_level == '' ) {
            return redirect()->to(base_url('/masuk'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if( session()->id_level == 2 ) {
            return redirect()->to('/page-resepsionis');
        }
    }
}