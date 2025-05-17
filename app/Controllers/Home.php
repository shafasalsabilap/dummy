<?php

namespace App\Controllers;
$db = \Config\Database::connect();

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
        $db = \Config\Database::connect();
        echo $db->getVersion();  // Harusnya tampil versi MySQL
    }

    
}
