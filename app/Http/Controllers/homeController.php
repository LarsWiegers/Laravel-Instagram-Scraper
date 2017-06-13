<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    private $_instagramUrl = null;
    private $_full_url = null;
    function __construct()
    {
        define("default_account",     "puppiesforall");
        $this->_instagramUrl = "https://www.instagram.com/";
    }
    public function index(){
        return View('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){

        $images = [];
        $account =  $request->input('account-name');
        if($account == ' ' OR is_null($account)){
            $account = default_account;
        }
        $this->_full_url = $this->_instagramUrl . $account . "/";


        if($this->get_http_response_code($this->_full_url) != 200) {
            return View('search',["images" => [],"title" => "Sorry we could not find a person with that name"]);
        }
        $response = file_get_contents($this->_full_url);

        $lines = explode(PHP_EOL, $response);

        foreach($lines as $word){
            if(str_contains("" . $word,"<script type=\"text/javascript\">window._sharedData = {" )){
               $word =  explode("<script type=\"text/javascript\">window._sharedData = ",$word);
               $data = explode(",", $word[1]);

            }
        }
        foreach($data as $item) {
            if(str_contains($item, "\"display_src\": \"")){
               $image =  str_replace("\"display_src\": \"","",$item);
               $image = str_replace('"', "",$image);
               $images[] = $image;
            }
        }
        return View('search',["images" => $images,"title" => "The images we found of : " .$account]);
    }
    private function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

}
