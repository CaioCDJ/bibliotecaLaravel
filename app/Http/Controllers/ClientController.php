<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller {

  public function index(){
    
    $clientes = array('alguem',"aaaaaaaa","dddddd" );

    return $clientes; 
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
  public function getById( $id){

    $user = Client::all();

    return json_encode(dd($user));
  } 

  public function addUser(){} 
  
  public function updateUser(){} 
  
  public function updatePassword(){} 
  
  public function delete(){} 


}
