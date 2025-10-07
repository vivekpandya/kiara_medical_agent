<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckFrontLogin implements FilterInterface
{

    /**
     * Check loggedIn to redirect page
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();
        // Check if the user is logged in
        $is_user_logged_in = session()->get('is_user_logged_in');
        
        if (!session()->has('is_user_logged_in') && $is_user_logged_in != true ) {
            // Redirect to the login page or perform any other action
            if (!$request->isAJAX()) {                
                return redirect()->to('/login');
            } else {
                // For AJAX requests, return an error response (e.g., JSON response)
                $response = [
                    'status' => 401,
                    'message' => 'Session expired. Please log in again.',
                ];
                return $this->createResponse($response);
            }
        }
        // User's session is still active, continue with the request
        return $request;
        // if (session('admin_user_id') > 0) {
        //     return true;
        // }
        // else
        // {
        //     return redirect()->to('/login');
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        echo "HERE";
        die;
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