<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Client;
use App\Models\Portopolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $teams = Team::all();
        $clients = Client::all();
        $portopolios = Portopolio::all();
        return view("home",[
           'Page_name'=>'Home',
           "teams"=>$teams,
           "clients"=>$clients,
           "portopolios"=>$portopolios
       ]);
   }
}
