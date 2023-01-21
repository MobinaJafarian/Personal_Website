<?php

namespace App\Http\Services\Message\SMS;

use Illuminate\Support\Facades\Config;


class MeliPayamakService
{

    private $username;
    private $password;

    public function __construct(){
        $this->username = Config::get('sms.username');
        $this->password = Config::get('sms.password');
    }


    public function addContact()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/contacts.asmx?wsdl', array('encoding' => 'UTF-8'));
        $parameters['username'] = "***";
        $parameters['password'] = "***";
        $parameters['groupIds'] = "***"; //My group Id in panel
        $parameters['firstname'] = "MyUserFirstName";
        $parameters['lastname'] = "MyUserLastName";
        $parameters['nickname'] = "MyUserNickName";
        $parameters['corporation'] = "MyUserCorporation";
        $parameters['mobilenumber'] = "MyUserMobileNumber";
        $parameters['phone'] = "MyUserPhone";
        $parameters['fax'] = "MyUserFax";
        $parameters['birthdate'] = 2013 - 06 - 15; //for Example
        $parameters['email'] = "MyUserEmailAddress";
        $parameters['gender'] = 2; //For Example
        $parameters['province'] = 18; //For Example
        $parameters['city'] = 711; //For Example
        $parameters['address'] = "MyUserAddress";
        $parameters['postalCode'] = "MyUserPostalCode";
        $parameters['additionaldate'] = 2013 - 06 - 15; //For Example
        $parameters['additionaltext'] = "MyUserAdditionalText";
        $parameters['descriptions'] = "MyUserDescriptions";
        echo $sms_client->AddContact($parameters)->AddContactResult;
    }



    public function addSchedule()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/schedule.asmx?wsdl', array('encoding' => 'UTF-8'));

        $parameters['username'] = "***";
        $parameters['password'] = "***";
        $parameters['to'] =  "912***";
        $parameters['from'] = "3000***";
        $parameters['text'] = "Test";
        $parameters['isflash'] = false;
        $parameters['scheduleDateTime'] = "2013-06-15T16:50:45";
        $parameters['period'] = "Once";
        echo $sms_client->AddSchedule($parameters)->AddScheduleResult;
    }


    public function getCredit()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/Send.asmx?wsdl', array('encoding' => 'UTF-8'));

        $parameters['username'] = "username";
        $parameters['password'] = "password";

        echo $sms_client->GetCredit($parameters)->GetCreditResult;
    }


    public function getInboxCountSoapClient()
    {


        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/receive.asmx?wsdl', array('encoding' => 'UTF-8'));

        $parameters['username'] = "username";
        $parameters['password'] = "pass";
        $parameters['isRead'] = false;

        echo $sms_client->GetInboxCount($parameters)->GetInboxCountResult;
    }



    public function getMessageStr()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/Receive.asmx?wsdl', array('encoding' => 'UTF-8'));
        $parameters['username'] = "username";
        $parameters['password'] = "password";
        $parameters['location'] =  1;
        $parameters['from'] = "";
        $parameters['index'] = 0;
        $parameters['count'] = 10;
        echo $sms_client->GetMessageStr($parameters)->GetMessageStrResult;
    }

    public function SendSimpleSms2SoapClient()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding' => 'UTF-8'));

        $parameters['username'] = "demo";
        $parameters['password'] = "demo";
        $parameters['to'] = "912...";
        $parameters['from'] = "1000..";
        $parameters['text'] = "تست";
        $parameters['isflash'] = false;

        echo $sms_client->SendSimpleSMS2($parameters)->SendSimpleSMS2Result;
    }

    // public function sendSmsNuSoap()
    // {
    //     require_once('nusoap.php');
    //     $client = new nusoap_client('http://api.payamak-panel.com/post/send.asmx?wsdl');

    //     $err = $client->getError();

    //     if ($err) {

    //         echo 'Constructor error' . $err;
    //     }

    //     $parameters['username'] = "demo";
    //     $parameters['password'] = "demo";
    //     $parameters['to'] = "912...";
    //     $parameters['from'] = "1000..";
    //     $parameters['text'] = "تست";
    //     $parameters['isflash'] = false;


    //     $result = $client->call('SendSimpleSMS2', $parameters);
    //     print_r($result);
    // }


    public function sendSmsSoapClient($from, array $to, $text, $isFlash = true)
    {

        // turn off the WSDL cache
        ini_set("soap.wsdl_cache_enabled", "0");
        try {
            $client = new \SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding' => 'UTF-8'));
            $parameters['username'] = $this->username;
            $parameters['password'] = $this->password;
            $parameters['from'] = $from;
            $parameters['to'] = $to;
            $parameters['text'] = $text;
            $parameters['isflash'] = $isFlash;
            $parameters['udh'] = "";
            $parameters['recId'] = array(0);
            $parameters['status'] = 0x0;
            $GetCreditResult = $client->GetCredit(array("username" => $this->username, "password" => $this->password))->GetCreditResult;
            $sendSmsResult = $client->SendSms($parameters)->SendSmsResult;

            if($GetCreditResult == 0 && $sendSmsResult == 1){
                return true;
            }
            else{
                return false;
            }

        } catch (\SoapFault $ex) {
            echo $ex->faultstring;
        }
    }
}
