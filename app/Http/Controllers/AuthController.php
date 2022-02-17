<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use phpCAS;

class AuthController extends Controller
{
    public function login(){
        phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
        phpCAS::setNoCasServerValidation();
        if(!phpCAS::checkAuthentication()){
            phpCAS::forceAuthentication();
        }
        $isPolytech=false;
        $myfile = fopen("userlist.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $currentUser=fgets($myfile);
            if($currentUser==phpCAS::getAttribute("uid")) $isPolytech=true;
        }
        fclose($myfile);
        session()->put('isPolytech',$isPolytech);
        session()->put('uid',phpCAS::getAttribute("uid"));
        session()->put('prenom',phpCAS::getAttribute("givenname"));
        session()->put('nom',phpCAS::getAttribute("sn"));
        session()->put('mail',phpCAS::getAttribute("mail"));
        $admins=Admin::all();
        $isAdmin=false;
        foreach($admins as $admin){
            if($admin->uid==session("uid")) $isAdmin=true;
        }
        session()->put('isAdmin',$isAdmin);
        return redirect('/');
    }
    public function logout(){
        session()->forget(['uid','nom','prenom','mail']);
        session()->save();
        phpCAS::client(CAS_VERSION_2_0,'auth.univ-lorraine.fr',443,'');
        phpCAS::logoutWithRedirectService("http://pive-site-web-international.univ-lorraine.fr");
    }
}
