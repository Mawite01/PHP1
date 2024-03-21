<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
   
   public function index()
   {
    $baseURL = ENV('API_URL');

    $client = new Client();
    $response = $client->request('GET', $baseURL.'employees');
    
    $response = json_decode($response->getBody());

    $result = $response->data;

    return view('employees.index',compact('result'));

   }
}
