<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class api extends Controller {

    public function PushNotifFireBase($act = '') {
        
        if ($act == 'PushNotif') {
            $Title          =   trim($_POST['Title']);
            $message        =   trim($_POST['message']);
            $click_action   =   trim($_POST['click_action']);
            $Module         =   trim($_POST['Module']);
            $UserId         =   trim($_POST['UserId']);
            $data = $this->model('Notifikasi_model')->PushNotifFireBase($Title, $message, $click_action, $Module, $UserId);
            
            return $data;
        }
    }

    // public function api_jne(){
    //     $from   = 'CKR10000';
    //     // $thru   = 'MES10300';
    //     // $weight = 45;
    //     $from   = trim($_REQUEST['from']);
    //     $thru   = trim($_REQUEST['thru']);
    //     $weight = trim($_REQUEST['weight']);

    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL             => "http://apiv2.jne.co.id:10101/tracing/api/pricedev",
    //         CURLOPT_RETURNTRANSFER  => true,
    //         CURLOPT_ENCODING        => "",
    //         CURLOPT_MAXREDIRS       => 10,
    //         CURLOPT_TIMEOUT         => 30,
    //         CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST   => "POST",
    //         CURLOPT_POSTFIELDS      => "username=SFP&api_key=5922455f3e535904b272338b05c04093&from=CKR10000&thru=$thru&weight=$weight",
    //         CURLOPT_HTTPHEADER      => array(
    //             "content-type: application/x-www-form-urlencoded",
    //             "accept: application/json"
    //         )
    //     ));
    //     $response   = curl_exec($curl);
    //     $err        = curl_error($curl);
    //     curl_close($curl);
    //     $data       = json_decode($response, true);

    //     echo "username=SFP&api_key=5922455f3e535904b272338b05c04093&from=CKR10000&thru=$thru&weight=$weight";

    //     echo '<pre>';
    //     echo print_r($err);
    //     echo print_r($data);
    //     echo '</pre>';

    //     $list_service = array();
    //     foreach ((array)$data['price'] as $key => $value) {
    //         $service_display = $value['service_display'];
    //         $list_service[$service_display] = $value;
    //     }

    //     // echo '<pre>';
    //     // print_r($list_service);
    //     echo json_encode($list_service);
    // }

    public function api_jne(){
        $from   = trim($_REQUEST['from']);
        $thru   = trim($_REQUEST['thru']);
        $weight = trim($_REQUEST['weight']);
        $kurir  = trim($_REQUEST['kurir']);

        // if($kurir == 'SFP')
        // {

        // }
        $data = array(
			'from'      => $from,
			'thru'      => $thru,
            'weight'    => $weight
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://10.20.107.19/api/api_jne');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Key: 4dm1n5pn"));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$Result = curl_exec($ch);
		curl_close($ch);

        $data       = json_decode($Result, true);

        // echo '<pre>';
        // echo print_r($Result);
        // echo print_r($data);
        // echo '</pre>';

        // if($data){
        //     foreach($data as $value){
                // if($value['service'] == 'REG'){
                    echo json_encode($data['REG']['price']);
                // }
        //     }
        // }

		// return $Result;

        
    }

}