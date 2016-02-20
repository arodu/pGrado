<?php
App::uses('Component', 'Controller');


class ReCaptchaComponent extends Component {

	private $google_url="https://www.google.com/recaptcha/api/siteverify";

	public function __construct(ComponentCollection $collection, $settings = array()) {
		$settings = array_merge($this->settings, (array)$settings);
		$this->Controller = $collection->getController();
		parent::__construct($collection, $settings);
	}

	public function verificar($recaptcha){

		$secret  = Configure::read('google_recaptcha.secretkey');
		$user_ip = $_SERVER['REMOTE_ADDR'];

		$url = $this->google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$user_ip;

		$resp = $this->getCurlData($url);
		$resp= json_decode($resp, true);
		$this->resp = $resp;
		return $this->resp['success'];
	}

	public function valido(){
		return $this->resp['success'];
	}

	public function error(){
		if(isset($this->resp['error-codes'])){
			return $this->resp['error-codes'];
		}else{
			return false;
		}
	}

	public function getCurlData($url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		//curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
		$curlData = curl_exec($curl);
		curl_close($curl);
		return $curlData;
	}

}

