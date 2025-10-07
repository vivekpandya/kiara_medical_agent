<?php 
// app/Filters/SkipAJAXFilter.php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SkipAJAXFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($request->isAJAX()) {
            return $request;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after the request
    }
}
