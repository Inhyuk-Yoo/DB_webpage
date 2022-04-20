<?php

class PMember{
	private $private_id;
	private $private_pwd;
	private $private_name;
	private $private_secnum;
	private $private_address;
	private $private_phone;
	private $bank_id;
	private $account;
	
	public function __construct($private_id, $private_pwd, $private_name, $private_secnum, $private_address, $private_phone, $bank_id, $account){
		$this->private_id = $private_id;
		$this->private_pwd = $private_pwd;
		$this->private_name = $private_name;
		$this->private_secnum = $private_secnum;
		$this->private_address = $private_address;
		$this->private_phone = $private_phone;
		$this->bank_id = $bank_id;
		$this->account = $account;
	}
	
	public function setPrivateId($private_id){
		$this->private_id = $private_id;
	}
	public function getPrivateId(){
		return $this->private_id;
	}
	public function setPrivatePwd($private_pwd){
		$this->private_pwd = $private_pwd;
	}
	public function getPrivatePwd(){
		return $this->private_pwd;
	}
	public function setPrivateName($private_name){
		$this->private_name = $private_name;
	}
	public function getPrivateName(){
		return $this->private_name;
	}
	public function setPrivateSecnum($private_secnum){
		$this->private_secnum = $private_secnum;
	}
	public function getPrivateSecnum(){
		return $this->private_secnum;
	}
	public function setPrivateAddress($private_address){
		$this->private_address = $private_address;
	}
	public function getPrivateAddress(){
		return $this->private_address;
	}
	public function setPrivatePhone($private_phone){
		$this->private_phone = $private_phone;
	}
	public function getPrivatePhone(){
		return $this->private_phone;
	}
	public function setBankId($bank_id){
		$this->bank_id = $bank_id;
	}
	public function getBankId(){
		return $this->bank_id;
	}
	public function setAccount($account){
		$this->account = $account;
	}
	public function getAccount(){
		return $this->account;
	}
}

class CMember{
	private $corp_id;
	private $corp_pwd;
	private $corp_name;
	private $corp_secnum;
	private $corp_address;
	private $corp_phone;
	private $bank_id;
	private $account;
	
	public function __construct($corp_id, $corp_pwd, $corp_name, $corp_secnum, $corp_address, $corp_phone, $bank_id, $account){
		$this->corp_id = $corp_id;
		$this->corp_pwd = $corp_pwd;
		$this->corp_name = $corp_name;
		$this->corp_secnum = $corp_secnum;
		$this->corp_address = $corp_address;
		$this->corp_phone = $corp_phone;
		$this->bank_id = $bank_id;
		$this->account = $account;
	}
	
	public function setCorpId($corp_id){
		$this->corp_id = $corp_id;
	}
	public function getCorpId(){
		return $this->corp_id;
	}
	public function setCorpPwd($corp_pwd){
		$this->corp_pwd = $corp_pwd;
	}
	public function getCorpPwd(){
		return $this->corp_pwd;
	}
	public function setCorpName($corp_name){
		$this->corp_name = $corp_name;
	}
	public function getCorpName(){
		return $this->corp_name;
	}
	public function setCorpSecnum($corp_secnum){
		$this->corp_secnum = $corp_secnum;
	}
	public function getCorpSecnum(){
		return $this->corp_secnum;
	}
	public function setCorpAddress($corp_address){
		$this->corp_address = $corp_address;
	}
	public function getCorpAddress(){
		return $this->corp_address;
	}
	public function setCorpPhone($corp_phone){
		$this->corp_phone = $corp_phone;
	}
	public function getCorpPhone(){
		return $this->corp_phone;
	}
	public function setBankId($bank_id){
		$this->bank_id = $bank_id;
	}
	public function getBankId(){
		return $this->bank_id;
	}
	public function setAccount($account){
		$this->account = $account;
	}
	public function getAccount(){
		return $this->account;
	}
}

?>