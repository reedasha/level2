<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PullrequestController extends Controller
{

    //GET method for public repositories
    public function show() {
        $repo = $_GET["reposlug"];
        $url = 'https://api.bitbucket.org/2.0/repositories/' . $repo . '/pullrequests';

        $options = array('http' => array(
            'method'  => 'GET',
            'ignore_errors' => TRUE
        ));

        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        //Get HTTP code in case of an error, to generate custom response
        $code = $this->getHttpCode($http_response_header);

        $ret = $this->open_pr($code, $response);

        //In case of lack of pull requests for a repository, inform user
        if($ret == 0)
        {
            print("No open Pull Requests for that repository!");
        }

        return view('welcome');
    }

    //POST method for private repositories
    public function show_private() {
        $repo = $_POST["reposlug"];
        $token = $_POST["token"];

        $url = 'https://api.bitbucket.org/2.0/repositories/' . $repo . '/pullrequests';

        $options = array('http' => array(
            'method'  => 'GET',
            'ignore_errors' => TRUE,
            'header'  =>
                "Authorization: Bearer " .$token ."\r\n"
        ));

        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        $code = $this->getHttpCode($http_response_header);
        $ret = $this->open_pr($code, $response);

        //In case of lack of pull requests for a repository, inform user
        if($ret == 0)
        {
            print("No open Pull Requests for that repository!");
        }

        //return to page with a token
        return view('auth', ['tokeen' => $token]);
    }

    //Method, that opens PRs in new tabs, if there are any
    private function open_pr($code, $response)
    {
        if($code == 200) {
            $bool = false;
            $hrefs = json_decode($response);
            foreach ($hrefs->values as $item)
            {
                if(property_exists ($item, 'links'))
                {
                    if(property_exists ($item->links,'html'))
                    {
                        if(property_exists ($item->links->html, 'href'))
                        {
                            $link = $item->links->html->href;
                            echo "<script>window.open('".$link."', '_blank')</script>";

                            //Set boolean to true if there is at least one open PR
                            $bool = true;
                        }
                    }
                }
            }
            return $bool == true ? 1 : 0;
        }

        else {
            switch($code){
                case 403:
                    print("You need to authorize to access private repository");
                    break;
                case 404:
                    print('No such repository found');
                    break;
            }
            return 1;
        }
    }

    //Method returns HTTP code header
    private function getHttpCode($http_response_header)
    {
        if(is_array($http_response_header))
        {
            $parts=explode(' ',$http_response_header[0]);
            //HTTP/1.0 <code> <text>
            if(count($parts)>1)
                //Get code
                return intval($parts[1]);
        }
        return 0;
    }
}
