<?php include ("header.php"); ?>
<?php
require_once 'login_service.php';
class MemberController{
	private $pService;
	private $cService;
	private $action;
	private $data;
	private $view;
	private $p_m;
	private $c_m;
	
	public function __construct($action){
		$this->pService = new PMemberService();
		$this->cService = new CMemberService();
		$this->action = $action;
	}
	public function run(){
		switch ($this->action){
			case "private_join":
				$this->private_join();
				break;
			case "corp_join":
				$this->corp_join();
				break;
			case "private_login":
				$this->private_login();
				break;
			case "corp_login":
				$this->corp_login();
				break;
			case "editInfo":
				$this->editInfo();
				break;
			case "pmyInfo":
				$this->pmyInfo();
				break;
			case "cmyInfo":
				$this->cmyInfo();
				break;
			case "logout":
				$this->logout();
				break;
			case "pout":
				$this->out();
				break;
			case "cout":
				$this->out();
				break;
			case "private_join_form":
				$this->private_join_form();
				break;
			case "corp_join_form":
				$this->corp_join_form();
				break;
		}
		require '$this->view';
		
	}
	public function private_join(){
		//수정필요
		//$str = implode(",", $_POST['hobby']);
		$p_m = new Member($_POST['private_id'],$_POST['private_pwd'],$_POST['private_name'],
				$_POST['private_secnum'], $_POST['private_address'], $_POST['private_phone'], $_POST['bank_id'], $_POST['account']);
		$this->pService->private_join($p_m);
		$this->data = "가입되었습니다.";
		$this->view = "login_form.php";
	}
	public function corp_join(){
		//수정필요
		//$str = implode(",", $_POST['hobby']);
		$c_m = new Member($_POST['corp_id'],$_POST['corp_pwd'],$_POST['corp_name'],
				$_POST['corp_secnum'], $_POST['corp_address'], $_POST['corp_phone'], $_POST['bank_id'], $_POST['account']);
		$this->cService->corp_join($c_m);
		$this->data = "가입되었습니다.";
		$this->view = "login_form.php";
	}
	
	public function private_join_form(){
		$this->view = "private_join_form.php";
		//echo("<script>location.replace('private_join_form.php');</script>");
	}
	
	public function corp_join_form(){
		//$this->hobbyList();
		$this->view = "corp_join_form.php";
	}
	
	public function private_login(){
		$tmp=$this->pService->login($_POST['private_id'],$_POST['private_pwd']);
		if($tmp==1){
			// 아이디가 존재하지 않음.
			$this->data = "없는 아이디입니다.";
			$this->view = "login_form.php";
		}else if($tmp==2){
			// 패스워드 틀림.
			$this->data = "잘못된 패스워드입니다.";
			$this->view = "login_form.php";
		}else{
			$this->data = "로그인에 성공하였습니다.";
			// 수정필요 ******************
			$this->view = "private_main.php";
		}
	}
	
	public function corp_login(){
		$tmp=$this->cService->login($_POST['corp_id'],$_POST['corp_pwd']);
		if($tmp==1){
			// 아이디가 존재하지 않음.
			$this->data = "없는 아이디입니다.";
			$this->view = "login_form.php";
		}else if($tmp==2){
			// 패스워드 틀림.
			$this->data = "잘못된 패스워드입니다.";
			$this->view = "login_form.php";
		}else{
			$this->data = "로그인에 성공하였습니다.";
			// 수정필요
			$this->view = "corp_main.php";
		}
	}
	
	public function logout(){
		$this->pService->logout();
		$this->view = "login_form.php";
	}
	
	//수정필요 **********
	public function pmyInfo(){
		$private_id=$_GET['private_id'];
		$this->p_m = $this->pService->getMember($private_id);
		$this->view = "editForm.php";
	}
	
	public function cmyInfo(){
		$corp_id=$_GET['corp_id'];
		$this->c_m = $this->cService->getMember($corp_id);
		$this->view = "editForm.php";
	}
	
	public function pout(){
		$this->pService->out();
		$this->data = "탈퇴되었습니다.";
		$this->view = "login_form.php";
	}
	
	public function cout(){
		$this->cService->out();
		$this->data = "탈퇴되었습니다.";
		$this->view = "login_form.php";
	}
	
	public function editInfo(){
		//$str = implode(",", $_POST['hobby']);
		$mem = new Member($_GET['id'],$_POST['pwd'],$_POST['name'],$_POST['email'],$str,$_POST['msg']);
		$this->mService->editInfo($mem);
		$this->data = "수정되었습니다.";
		$this->view = "index.php";
	}
	
}
?>
<?php include ("footer.php"); ?>