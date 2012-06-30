<?php

$client = new SoapClient("some.wsdl");

$client = new SoapClient("some.wsdl", array('soap_version'  => SOAP_1_2));

$client = new SoapClient("some.wsdl", array('login'          => "some_name",
                                           'password'      => "some_password"));

$client = new SoapClient("some.wsdl", array('proxy_host'    => "localhost",
                                           'proxy_port'    => 8080));

$client = new SoapClient("some.wsdl", array('proxy_host'    => "localhost",
                                           'proxy_port'    => 8080,
                                           'proxy_login'    => "some_name",
                                           'proxy_password' => "some_password"));

$client = new SoapClient("some.wsdl", array('local_cert'    => "cert_key.pem"));

$client = new SoapClient(null, array('location' => "http://localhost/soap.php",
                                     'uri'      => "http://test-uri/"));

$client = new SoapClient(null, array('location' => "http://localhost/soap.php",
                                     'uri'      => "http://test-uri/",
                                     'style'    => SOAP_DOCUMENT,
                                     'use'      => SOAP_LITERAL));

$client = new SoapClient("some.wsdl",
  array('compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP));

$server = new SoapClient("some.wsdl", array('encoding'=>'ISO-8859-1'));

class MyBook {
   public $title;
   public $author;
}

$server = new SoapClient("books.wsdl", array('classmap' => array('book' => "MyBook")));

?>