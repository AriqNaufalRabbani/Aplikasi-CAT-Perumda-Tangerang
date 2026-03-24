<?php
defined('BASE_PATH') OR exit('No direct script access allowed');

class Notifikasi_model {
	private $db;

	public function __construct() {
		$this->db = new Database;
        $this->UserID   = USERID;
	}

	public function get10AllNotif($UserId = '') {
        $Q = "
            SELECT TOP 10 * 
            FROM _CRM_Notif
            WHERE nik = '$UserId'
            ORDER BY IdNotif DESC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		return $this->db->fetchAll();
	}

	public function getUnreadNotifByUser($UserId = '') {
        $Q = "
            SELECT * 
            FROM _CRM_Notif
            WHERE nik = '$UserId'
                AND isOpen != 'Y'
            ORDER BY IdNotif DESC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		return $this->db->fetchAll();
	}

	public function getNotifByUser($UserId = '') {
        $Q = "
            SELECT *
            FROM _CRM_Notif
            WHERE nik = '$UserId'
                AND isNotif != 'Y'
            ORDER BY IdNotif ASC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$res = $this->db->fetchAll();

        // foreach ($res as $dataNotif) {
        //     $client_token   = trim($dataNotif["Token"]);
        //     $message        = trim($dataNotif["Pesan"]);
        //     $pisah          = explode("<br>", $message);
        //     $title          = $pisah[0];
        //     $click_action   = trim($dataNotif["Link"]);
        //     $Module         = trim($dataNotif["Module"]);
        //     $data 		  = array(
        //         "testing" => 1, 
        //         "tag" => $Module
        //     );

        // }

        // $Send = $this->model('FCM_model')->sendNotificationPersonal($client_token, $title, $message, $click_action, $data);

        return $res;
	}
    
	public function updateNotifOnShow($IdNotif) {
        $Q = "
            Update _CRM_Notif SET 
                  isNotif = 'Y'
                , UpdDt = getdate()
                , UpdBy = '". USERID ."'
            WHERE IdNotif = '$IdNotif'
        ";
		$this->db->prepare($Q);
		return $this->db->execute();
	}

    public function updateNotifOnOpen($IdNotif) {

        $Q = "
            Update _CRM_Notif SET 
                  isOpen = 'Y'
                , UpdDt = getdate()
                , UpdBy = '". USERID ."'
            WHERE IdNotif = '$IdNotif'
        ";
		$this->db->prepare($Q);
		return $this->db->execute();
	}

    public function updateNotifOnOpenAll() {

        $Q = "
            Update _CRM_Notif SET 
                  isOpen = 'Y'
                , UpdDt = getdate()
                , UpdBy = '". USERID ."'
            WHERE NIK = '". USERID ."'
            AND isOpen != 'Y'
        ";
		$this->db->prepare($Q);
		return $this->db->execute();
	}
    
	public function updateAllNotifOnShow($UserId = '') {
        $Q = "
            Update _CRM_Notif SET 
                  isNotif = 'Y'
                , UpdDt = getdate()
                , UpdBy = '". $UserId ."'
            WHERE nik = '". $UserId ."'
        ";
		$this->db->prepare($Q);
		return $this->db->execute();
	}
    
	public function updateAllNotif($UserId = '', $Module = '%') {
        $Q = "
            Update _CRM_Notif SET 
                  isNotif = 'Y'
                , isOpen = 'Y'
                , UpdDt = getdate()
                , UpdBy = '". USERID ."'
            WHERE nik = '$UserId'
            AND Module LIKE '%$Module%'
        ";
		$this->db->prepare($Q);
		return $this->db->execute();
	}

	public function getAllNotifByUser($UserId = '') {
        $Q = "
            SELECT * 
            FROM _CRM_Notif
            WHERE nik = '$UserId'
            ORDER BY CrtDt DESC
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		return $this->db->fetchAll();
	}

    public function PushNotifSQL($Title, $message, $click_action, $Module, $UserId){
        $Query = "
            INSERT INTO [dbo].[_CRM_Notif]
                    (   [NIK]
                    ,   [Title]
                    ,   [Pesan]
                    ,   [Link]
                    ,   [Module]
                    ,   [isOpen]
                    ,   [isNotif]
                    ,   [CrtDt]
                    ,   [CrtBy]
                    ,   [UpdDt]
                    ,   [UpdBy])
                VALUES(
                        '$UserId'
                    ,   '$Title'
                    ,   '$message'
                    ,   '$click_action'
                    ,   '$Module'
                    ,   'N'
                    ,   'N'
                    ,   GETDATE()
                    ,   '$this->UserID'
                    ,   GETDATE()
                    ,   '$this->UserID'
                ) 
        ";

        $this->db->prepare($Query);
        return $this->db->execute();
    }


    public function PushNotifFireBase($Title, $message, $click_action, $Module, $UserId) {
        if($_POST['Title']){
            $Title          =   trim($_POST['Title']);
            $message        =   trim($_POST['Pesan']);
            $click_action   =   trim($_POST['Link']);
            $Module         =   trim($_POST['Module']);
        }

        if(isset($_POST['UserId'])){
            $UserId         =   trim($_POST['UserId']);
        }

        $data 		  = array(
            "tag"       => $Module
        );

        $Q = "
            SELECT Token
            FROM _CRM_NotifToken
            WHERE nik = '$UserId'
        ";
		$this->db->prepare($Q);
		$this->db->execute();
		$getUsersTokens = $this->db->fetchAll();

        $tokens = array();
		foreach ($getUsersTokens as $dataToken) {
			$tokens[]  = trim($dataToken['Token']);
        }

        $this->PushNotifSQL($Title, $message, $click_action, $Module, $UserId);

        return $this->sendNotification($tokens, $Title, $message, $click_action, $data);

    }

    private function sendNotification($client_token, $title, $message, $click_action = '', $data = array()) {
		/* Your server key from firebase */
        $server_key = "AAAAzUJyYL0:APA91bF0bF2HOYlJCf2OYaADhEP0ciG9JF3fhVwaEb2ADRLql7mdGFGWXe6c34GCUgKbAYHqqDbM30Oyfl6NaTO2yzrkxfAD1HiQAwusMviTzkUcUj0VCybSrDqFI1hbDILktT2Sak7a";
        $HttpHeader = array(
            "Authorization: key=$server_key",
            "Content-Type:application/json"
        );

        $tag 		= isset($data['tag']) ? $data['tag'] : '';
        $PostFields = array(
            // "to" => $client_token, //Client Token
            "registration_ids" => $client_token, //Client Tokens (mengirim banyak toekn sekaligus berupa array)
            "notification" => array(
                "icon"          => BASE_URL ."cdn/images/Logo_CRM/PNG/crm-sq-bg-white.png",
                "title"         => $title,
                "body"          => substr(strip_tags($message), 0, 128),
                "click_action"  => $click_action,
			  	"tag"			=> $tag,
			  	"renotify" 		=> true,
            ),
            "data" => $data
        );
        $options = array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_HTTPHEADER => $HttpHeader,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($PostFields),
        );
    	$ch = curl_init();
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

}