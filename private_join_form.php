<?php include ("header.php"); ?>

<html>
<head>
<script type="text/javascript">
function a(){
	if(pf.private_id.value==null || pf.private_id.value==''){
		alert("id는 필수사항입니다.");
		pf.private_id.focus();
	}
	if(pf.pwd.value==null || pf.pwd.value==''){
		alert("pwd는 필수사항입니다.");
		pf.pwd.focus();
	}
	if(pf.name.value==null || pf.name.value==''){
		alert("name는 필수사항입니다.");
		pf.name.focus();
	}
	if(pf.email.value==null || pf.email.value==''){
		alert("email는 필수사항입니다.");
		pf.email.focus();
	}
	pf.submit(); // //
	
}
</script>
</head>

<body>
<h3>              회원가입</h3>
<form action="login_index.php?action=private_join" method="post" name="pf">
<pre>
   id(필수):<input type="text" name="id"><br>
  pwd(필수):<input type="text" name="pwd"><br>
 name(필수):<input type="text" name="name"><br>
email(필수):<input type="text" name="email"><br>
<br>

가입인사:
<textarea cols="45" rows="5" name="msg"></textarea><br>
                                   <input type="button" value="가입" onclick="a()"> <input type="reset" value="취소">
</pre>
</form>
</body>
</html>

<?php include ("footer.php"); ?>