<?php include ("header.php"); ?>
<?php
require_once 'dao.php';

class PMemberService{
	private $dao;
	public function __construct(){
		$this->dao = new PMemberDao();
	}
	public function private_join($p_m){
		$this->dao->insert($p_m);
	}
	public function private_login($private_id, $private_pwd){
		$p_m = $this->dao->select($private_id);
		if($p_m==null){
			return 1;
		}else{
			if($p_m->getPrivatePwd()==$private_pwd){
				session_start();
				$_SESSION['private_id']=$private_id;
				return 3;
			}else{
				return 2;
			}
		}
	}
	public function logout(){
		if(session_status()!=PHP_SESSION_ACTIVE){
			session_start();
		}
		session_unset();
		session_cache_expire(60);
		session_destroy();
	}
	public function out(){
		if(session_status()!=PHP_SESSION_ACTIVE){
			session_start();
		}
		if(isset($_SESSION['private_id'])){
			$this->dao->delete($_SESSION['private_id']);
			$this->logout();
		}
	}
	public function editInfo($p_m){
		$this->dao->update($p_m);
	}
	
	public function getMember($private_id){
		return $this->dao->select($private_id);
	}
}

class CMemberService{
	private $dao;
	public function __construct(){
		$this->dao = new CMemberDao();
	}
	public function corp_join($c_m){
		$this->dao->insert($c_m);
	}
	public function corp_login($corp_id, $corp_pwd){
		$c_m = $this->dao->select($corp_id);
		if($c_m==null){
			return 1;
		}else{
			if($c_m->getCorpPwd()==$corp_pwd){
				session_start();
				$_SESSION['corp_id']=$corp_id;
				return 3;
			}else{
				return 2;
			}
		}
	}
	public function logout(){
		if(session_status()!=PHP_SESSION_ACTIVE){
			session_start();
		}
		session_unset();
		session_cache_expire(60);
		session_destroy();
	}
	public function out(){
		if(session_status()!=PHP_SESSION_ACTIVE){
			session_start();
		}
		if(isset($_SESSION['corp_id'])){
			$this->dao->delete($_SESSION['corp_id']);
			$this->logout();
		}
	}
	public function editInfo($c_m){
		$this->dao->update($c_m);
	}
	
	public function getMember($corp_id){
		return $this->dao->select($corp_id);
	}
}

?>
<?php include ("footer.php"); ?>