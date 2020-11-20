<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;

class HomeController extends Controller
{
    public function index() {
        $client = new Client([
            'host' => '192.168.18.29',
            'user' => 'admin',
            'pass' => 'olisamping'
        ]);

        $user = $client->query('/ip/hotspot/user/print')->read();
        $aktif = $client->query('/ip/hotspot/active/print')->read();
        $totalUser = count($user);
        $totalAktif = count($aktif);

       return view('home', compact('totalUser', 'totalAktif'));
    }
}
