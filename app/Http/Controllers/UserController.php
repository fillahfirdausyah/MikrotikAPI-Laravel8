<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class UserController extends Controller
{


    public function index() {
        $client = new Client([
            'host' => '192.168.18.41',
            'user' => 'admin',
            'pass' => 'olisamping'
        ]);
        
        $data = $client->query('/ip/hotspot/user/print')->read();
        $user = collect($data)->except(['0'])->toArray(); 
        $aktif = $client->query('/ip/hotspot/active/print')->read();
        // if(count($aktif) == 0) {
        //     $aktif = ['d'];
        //     return view('user', compact('user', 'aktif'));
        // }else {
            return view('user', compact('user', 'aktif'));
        // }
    }

    public function add() {

        return view('addUser');
    }

    public function store(Request $request) {
        $client = new Client([
                    'host' => '192.168.18.41',
                    'user' => 'admin',
                    'pass' => 'olisamping'
                ]);
                // $test = $client->query('/ip/hotspot/active/print')->read();
                // dd($test);
        for($i = 0; $i < 100; $i++) {
            $password = Str::random(5);
            $username = Str::random(2) . "-lugaru";
            $client->query(['/ip/hotspot/user/add',  '=name='.$username, '=password='.$password])->read();
       }
       
        return redirect('/user');
    }

    public function destroy($id){
        $client = new Client([
            'host' => '192.168.18.41',
            'user' => 'admin',
            'pass' => 'olisamping'
        ]);
        $client->query(['/ip/hotspot/user/remove', '=.id='.$id])->read();

        return redirect('/user');
    }
}
