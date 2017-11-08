<?php

namespace Ngiasim\Aramex;
use App\Http\Controllers\Controller;
use SoapClient;

class AramexLocation extends Controller
{

	public function fetchAllCitiesByCountryCode($country_code="",$city="")
    {
    	$soapClient = new SoapClient('https://ws.dev.aramex.net/shippingapi/location/service_1_0.svc?wsdl');
		
	
		$params = array(
		'ClientInfo'  			=> array(
									'AccountCountryCode'		=> 'JO',
									'AccountEntity'		 	=> 'AMM',
									'AccountNumber'		 	=> '20016',
									'AccountPin'		 	=> '331421',
									'UserName'			=> 'testingapi@aramex.com',
									'Password'		 	=> 'R123456789$r',
									'Version'		 	=> 'v1.0',
									'Source' 			=> NULL			
								),

		'Transaction' 			=> array(
									'Reference1'			=> '001',
									'Reference2'			=> '002',
									'Reference3'			=> '003',
									'Reference4'			=> '004',
									'Reference5'			=> '005'
							 
								),
		'CountryCode'		=> $country_code,

		'State'				=> NULL,

		'NameStartsWith'	=> $city

		);
	
		// calling the method and printing results
		try {
			$auth_call = $soapClient->FetchCities($params);
			
			if(isset($auth_call->Cities->string)){
				return $auth_call->Cities->string;
			}
			else if(isset($auth_call->Notifications->Notification->Message)){
				return $auth_call->Notifications->Notification->Message;
			}else{
				if(!isset($auth_call->Notifications->Notification)){
					return "No match found.";
				}else{
					return "Sorry, something went wrong, please try again later.";
				}
			}	
		} catch (SoapFault $fault) {
			return array('Error : '=>$fault->faultstring);
		}

    }



    public function validateAddress($country="",$postcode="",$city="",$state=""){
    	$soapClient = new SoapClient('https://ws.dev.aramex.net/shippingapi/location/service_1_0.svc?wsdl');
		
	
		$params = array(
			'ClientInfo'  			=> array(
										'AccountCountryCode'		=> 'JO',
										'AccountEntity'		 	=> 'AMM',
										'AccountNumber'		 	=> '20016',
										'AccountPin'		 	=> '331421',
										'UserName'			=> 'testingapi@aramex.com',
										'Password'		 	=> 'R123456789$r',
										'Version'		 	=> 'v1.0',
										'Source' 			=> NULL			
									),

			'Transaction' 			=> array(
										'Reference1'			=> '001',
										'Reference2'			=> '002',
										'Reference3'			=> '003',
										'Reference4'			=> '004',
										'Reference5'			=> '005'
								 
									),
			'Address' 			=> array(
										'Line1'			=> '001',
										'Line2'			=> '',
										'Line3'			=> '',
										'City'			=> $city,
										'StateOrProvinceCode'			=> $state,
										'PostCode'			=> $postcode,
										'CountryCode'			=> $country							 
									)

			);
		
		try {
			$auth_call = $soapClient->ValidateAddress($params);

			if($auth_call->HasErrors > 0){
				if(isset($auth_call->Notifications->Notification->Message)){
					return $auth_call->Notifications->Notification->Message;
				}else{
					return $auth_call->Notifications;
				}
			}else{
					return "Validated.";	
			}

		} catch (SoapFault $fault) {
			return array('Error : '=>$fault->faultstring);
		}
    }




    public function fetchAllCountries()
    {
    	$soapClient = new SoapClient('https://ws.dev.aramex.net/shippingapi/location/service_1_0.svc?wsdl');
		$params = array(
		'ClientInfo'  			=> array(
									'AccountCountryCode'		=> 'JO',
									'AccountEntity'		 	=> 'AMM',
									'AccountNumber'		 	=> '20016',
									'AccountPin'		 	=> '331421',
									'UserName'			=> 'testingapi@aramex.com',
									'Password'		 	=> 'R123456789$r',
									'Version'		 	=> 'v1.0',
									'Source' 			=> NULL			
								),

		'Transaction' 			=> array(
									'Reference1'			=> '001',
									'Reference2'			=> '002',
									'Reference3'			=> '003',
									'Reference4'			=> '004',
									'Reference5'			=> '005'
							 
								),
		
		);
	
		// calling the method and printing results
		try {
			$auth_call = $soapClient->FetchCountries($params);
			return $auth_call;
			//return json_decode(json_encode($auth_call), true);
		} catch (SoapFault $fault) {
			return array('Error : '=>$fault->faultstring);
		}

    }
}

?>
