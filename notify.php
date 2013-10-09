<?php

use TwitterOAuth\TwitterOAuth;

date_default_timezone_set('UTC');

require_once __DIR__ . '/vendor/autoload.php';


function tweet($message){
    $config = array(
        'consumer_key' => '9Z2Vyw5nCBRrVgmljPylg',
        'consumer_secret' => '9CNIQcYhzNrnf6IqBBQhdO0bm3BpOVfqkggW8aboQ0c',
        'oauth_token' => '1920725383-cokYmw7PfqRTL98pGIO2Y7hl8OpajtVZTf3ZZBW',
        'oauth_token_secret' => 'FRLv16boAh4l0X0DRpbecRkZ1l5ENJWyycLrXU0MxEI',
        'output_format' => 'json'
    );

    $tw = new TwitterOAuth($config);

    $status = array( 'status' => $message );

    $mytweet = $tw->post('statuses/update', $status );
}

function get_status($url = null){
    if( ! $url ) return;
    $result = get_headers($url, 1);
    return $result;
}

function the_status( $url = null ){
    $origin = get_status($url);

    if($origin[0] == 'HTTP/1.1 200 OK'){
        return;
    } elseif($origin[0] == 'HTTP/1.1 301 Moved Permanently'){
        the_status($origin['Location']);
    } elseif($origin[0] == 'HTTP/1.1 404 Not Found'){
        $loc = parse_url($url);
        $say = $loc['host'] . 'cannot be found';
        $response = tweet($say);
    }
}


function check_sites(){
    $sites = array(
        'adaytonadream.com',
        'allied360.com',
        'anthemmotorsports.com',
        'cloud-innovators.com',
        'daytonadream.com'
    );
    foreach($sites as $site){
        $url = 'http://' . $site;
        the_status($url);
    } 
}

check_sites();

   