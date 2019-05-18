<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Property;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {

        $gitlink = $request->gitlink;
        $client = new Client();
        $response = $client->get('http://34.203.203.222/submit?git='.$gitlink);

        $url = $response->getBody();
        $result = json_decode($url, true);

        $json = "Assertions".$result["Assertions"]." "."Errors".$result["Errors"]." "."Tests".$result["Tests"];

        return back()->with('success',$json);

    }
}
