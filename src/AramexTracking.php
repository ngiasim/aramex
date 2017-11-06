<?php

namespace Ngiasim\Aramex;
use App\Http\Controllers\Controller;
use SoapClient;

class AramexTracking extends Controller
{
    public function track()
    {
    
    $soapClient = new SoapClient('https://ws.dev.aramex.net/shippingapi/tracking/service_1_0.svc?wsdl');
	$params = array(
		'ClientInfo'  			=> array(
										'AccountCountryCode'	=> 'JO',
										'AccountEntity'		 	=> 'AMM',
										'AccountNumber'		 	=> '20016',
										'AccountPin'		 	=> '331421',
										'UserName'			 	=> 'testingapi@aramex.com',
										'Password'			 	=> 'R123456789$r',
										'Version'			 	=> '1.0'
								),

		'Transaction' 			=> array(
									'Reference1'			=> '001' 
								),
		'Shipments'				=> array(
									'30421945993'
								)
	);
	
		// calling the method and printing results
		try {
			$auth_call = $soapClient->TrackShipments($params);
			return $auth_call;
		} catch (SoapFault $fault) {
			return array('Error : '=>$fault->faultstring);
		}

    }
}

?>
