<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is logged in
        if (!session()->has('admin_user_id')) {
            // Redirect to the login page or perform any other action
            if (!$request->isAJAX()) {                
                return redirect()->to('/login');
            } else {
                // For AJAX requests, return an error response (e.g., JSON response)
                $response = [
                    'status' => 'error',
                    'message' => 'Session expired. Please log in again.',
                ];
                return $this->createResponse($response);
            }
        }
        // User's session is still active, continue with the request
        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No need for an after filter in this example
    }

    // Helper method to create a JSON response
    private function createResponse($data)
    {
        $response = service('response');
        $response->setHeader('Content-Type', 'application/json');
        $response->setBody(json_encode($data));
        return $response;
    }
}
