<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;

class UserController extends Controller
{


    public function index() {
        $client = new Client([
            'host' => '192.168.18.29',
            'user' => 'admin',
            'pass' => 'olisamping'
        ]);
        
        $data = $client->query('/ip/hotspot/user/print')->read();
        $user = collect($data)->except(['0'])->toArray(); 
        return view('user', compact('user'));
    }

    public function add() {

        return view('addUser');
    }

    public function store(Request $request) {
        $client = new Client([
                    'host' => '192.168.18.29',
                    'user' => 'admin',
                    'pass' => 'olisamping'
                ]);
        $client->query(['/ip/hotspot/user/add',  '=name='.$request->username, '=password='.$request->password])->read();

        return redirect('/user');
    }

    public function destroy($id){
        $client = new Client([
            'host' => '192.168.18.29',
            'user' => 'admin',
            'pass' => 'olisamping'
        ]);
        $client->query(['/ip/hotspot/user/remove', '=.id='.$id])->read();

        return redirect('/user');
    }
}
