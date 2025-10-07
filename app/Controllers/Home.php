<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Home extends BaseController
{
    function __construct()
    {
    }

    
    public function contactus()
    {
        $data['meta_title'] = "Contact Us Today";
        $data['meta_description'] = "Have questions or inquiries? Contact MyAdultFosterCare.com today to learn more about our services. We're here to assist you in providing quality care for your loved ones.";
        $data['meta_keywords'] = "";
        $data['url'] = base_url() . "contactus";
        $data['page_code'] = "contactus";
        $data['pagemeta_img'] = base_url() . 'assets/images/homebannerrightimg.png';
        $data['pagemeta_img_alt'] = 'Adult Foster Care Software';
        return view('web/contact_us', $data);
    }
}
