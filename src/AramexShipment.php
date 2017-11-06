<?php

namespace Ngiasim\Aramex;
use App\Http\Controllers\Controller;
use SoapClient;

class AramexShipment extends Controller
{
    public function shipment()
    {
    
    $soapClient = new SoapClient('https://ws.aramex.net/shippingapi/shipping/service_1_0.svc?wsdl');
	//$soapClient = new SoapClient('shipping.wsdl');
	//$soapClient = new SoapClient('https://ws.aramex.net/shippingapi/shipping/service_1_0.svc?wsdl');
	//echo '<pre>';
	//print_r($soapClient->__getFunctions());
	
	$params = array(
			'Shipments' => array(
				'Shipment' => array(
						'Shipper'	=> array(
										'Reference1' 	=> 'Ref 111111',
										'Reference2' 	=> 'Ref 222222',
										'AccountNumber' => '20016',
										'PartyAddress'	=> array(
											'Line1'					=> 'Flat No:123',
											'Line2'					=> 'DHA',
											'Line3'					=> 'Phase 2',
											'City'					=> 'Riyadh',
											'StateOrProvinceCode'	=> '',
											'PostCode'				=> '21589',
											'CountryCode'			=> 'SA'
										),
										'Contact'		=> array(
											'Department'			=> '',
											'PersonName'			=> 'Saif',
											'Title'					=> '',
											'CompanyName'			=> 'Next Generation Innovations',
											'PhoneNumber1'			=> '2323232',
											'PhoneNumber1Ext'		=> '332',
											'PhoneNumber2'			=> '',
											'PhoneNumber2Ext'		=> '',
											'FaxNumber'				=> '',
											'CellPhone'				=> '0322-2222036',
											'EmailAddress'			=> 'saif@nextgeni.com',
											'Type'					=> ''
										),
						),
												
						'Consignee'	=> array(
										'Reference1'	=> 'Ref 333333',
										'Reference2'	=> 'Ref 444444',
										'AccountNumber' => '',
										'PartyAddress'	=> array(
											'Line1'					=> 'NextGenI , Dot Zero',
											'Line2' 				=> 'Dilkusha Forum',
											'Line3' 				=> 'Tariq Road',
											'City'					=> 'Jeddah',
											'StateOrProvinceCode'	=> '',
											'PostCode'				=> '21589',
											'CountryCode'			=> 'SA'
										),
										
										'Contact'		=> array(
											'Department'			=> '',
											'PersonName'			=> 'Asim',
											'Title'					=> '',
											'CompanyName'			=> 'NGI',
											'PhoneNumber1'			=> '2193036',
											'PhoneNumber1Ext'		=> '021',
											'PhoneNumber2'			=> '',
											'PhoneNumber2Ext'		=> '',
											'FaxNumber'				=> '',
											'CellPhone'				=> '0314-2193036',
											'EmailAddress'			=> 'asim@nextgeni.com',
											'Type'					=> ''
										),
						),
						
						'ThirdParty' => array(
										'Reference1' 	=> '',
										'Reference2' 	=> '',
										'AccountNumber' => '',
										'PartyAddress'	=> array(
											'Line1'					=> '',
											'Line2'					=> '',
											'Line3'					=> '',
											'City'					=> '',
											'StateOrProvinceCode'	=> '',
											'PostCode'				=> '',
											'CountryCode'			=> ''
										),
										'Contact'		=> array(
											'Department'			=> '',
											'PersonName'			=> '',
											'Title'					=> '',
											'CompanyName'			=> '',
											'PhoneNumber1'			=> '',
											'PhoneNumber1Ext'		=> '',
											'PhoneNumber2'			=> '',
											'PhoneNumber2Ext'		=> '',
											'FaxNumber'				=> '',
											'CellPhone'				=> '',
											'EmailAddress'			=> '',
											'Type'					=> ''							
										),
						),
						
						'Reference1' 				=> 'Shpt 0001',
						'Reference2' 				=> '',
						'Reference3' 				=> '',
						'ForeignHAWB'				=> 'eee 123455',
						'TransportType'				=> 0,
						'ShippingDateTime' 			=> time(),
						'DueDate'					=> time(),
						'PickupLocation'			=> 'Reception',
						'PickupGUID'				=> '',
						'Comments'					=> 'Shpt 0001',
						'AccountingInstrcutions' 	=> '',
						'OperationsInstructions'	=> '',
						
						'Details' => array(
										'Dimensions' => array(
											'Length'				=> 10,
											'Width'					=> 10,
											'Height'				=> 10,
											'Unit'					=> 'cm',
											
										),
										
										'ActualWeight' => array(
											'Value'					=> 2.5,
											'Unit'					=> 'Kg'
										),
										
										'ProductGroup' 			=> 'DOM',
										'ProductType'			=> 'PDX',
										'PaymentType'			=> 'P',
										'PaymentOptions' 		=> 'CASH',
										'Services'				=> 'CODS',
										'NumberOfPieces'		=> 1,
										'DescriptionOfGoods' 	=> 'Docs',
										'GoodsOriginCountry' 	=> 'Jo',
										
										'CashOnDeliveryAmount' 	=> array(
											'Value'					=> 500,
											'CurrencyCode'			=> 'AED'
										),
										
										'InsuranceAmount'		=> array(
											'Value'					=> 0,
											'CurrencyCode'			=> ''
										),
										
										'CollectAmount'			=> array(
											'Value'					=> 0,
											'CurrencyCode'			=> ''
										),
										
										'CashAdditionalAmount'	=> array(
											'Value'					=> 10,
											'CurrencyCode'			=> 'AED'							
										),
										
										'CashAdditionalAmountDescription' => 'Delivery Charges',
										
										'CustomsValueAmount' => array(
											'Value'					=> 0,
											'CurrencyCode'			=> ''								
										),
										
										'Items' 				=> array(
											'Item Name'			=> 'Femi9 Branded Jeans'
										)
						),
				),
			),
			
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
											'Reference1'			=> '001',
											'Reference2'			=> '', 
											'Reference3'			=> '', 
											'Reference4'			=> '', 
											'Reference5'			=> '',									
										),
				'LabelInfo'				=> array(
											'ReportID' 				=> 9201,
											'ReportType'			=> 'URL',
				),
		);
		
		$params['Shipments']['Shipment']['Details']['Items'][] = array(
			'PackageType' 	=> 'Box',
			'Quantity'		=> 1,
			'Weight'		=> array(
					'Value'		=> 2.5,
					'Unit'		=> 'Kg',		
			),
			'Comments'		=> 'Garments',
			'Reference'		=> ''
		);
		
		try {
			$auth_call = $soapClient->CreateShipments($params);
			return $auth_call;
		} catch (SoapFault $fault) {
			return array('Error : '=>$fault->faultstring);
			//die('Error : ' . $fault->faultstring);
		}
    }
}

?>
