<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PublicController extends Controller
{
    
public function homepage(){
    return view('welcome');
 }


 public function chiSiamo(){
    return view('about_us');
 }

 public function prodotti(){
    return view('prodotti');
 }

 public function contattaci(){
   return view('contact_us');
 }

 public function servizi(){
   return view('servizi');
 }

 public function ourBrand(){
   return view('our_brand');
 }

}


