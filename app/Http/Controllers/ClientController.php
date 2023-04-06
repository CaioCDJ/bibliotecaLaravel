<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller {


  public function login(){

    return view("pages/account");
  }

  /**
   * busca um usuario pelo id
   *
   * Undocumented function long description
   *
   * @id uuid $var Description
   * @return client
   * @throws conditon
   **/
  public function getById($id){

    $user = Client::all();

    return view('pages/account',compact('id'));
  } 

  public function addUser(){} 
  
  public function updateUser(){} 
  
  public function updatePassword(){} 
  
  public function delete(){} 


}
