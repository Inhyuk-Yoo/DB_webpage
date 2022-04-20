<?php include ("header.php"); ?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && $this->action=='private_login'){
	print "<script>alert('".$this->data."');</script>";
}
?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && $this->action=='corp_login'){
	print "<script>alert('".$this->data."');</script>";
}
?>
<html>
<body>

<h3>개인회원 로그인</h3><br>
<!-- <form action="login_index.php?action=private_login" method="post"> -->
<form action="private_main.php" method="post">
<pre>
 id:<input type="text" name="id"><br>
pwd:<input type="text" name="pwd"><br>
                <!-- <input type="submit" value="개인회원 login"><br> -->
                <input type="submit" value="개인회원 login"><br>
                <a href="login_index.php?action=private_join_form">개인회원가입</a>
</pre>
</form><br><br>

<h3>법인회원 로그인</h3><br>
<!-- <form action="login_index.php?action=corp_login" method="post"> -->
<form action="corp_main.php" method="post">
<pre>
 id:<input type="text" name="id"><br>
pwd:<input type="text" name="pwd"><br>
                <input type="submit" value="법인회원 login"><br>
                <a href="login_index.php?action=corp_join_form">법인회원가입</a>
</pre>
</form>

</form><br><br>

<p>관리자 로그인</p><br>
<!-- <form action="login_index.php?action=corp_login" method="post"> -->
<form action="admin_main.php" method="post">
<pre>
<!-- id:<input type="text" name="id"><br>
pwd:<input type="text" name="pwd"><br> -->
                <input type="submit" value="관리자 login"><br>
                <!-- <a href="login_index.php?action=corp_join_form">법인회원가입</a> -->
</pre>
</form>
</body>
</html>
<?php include ("footer.php"); ?>