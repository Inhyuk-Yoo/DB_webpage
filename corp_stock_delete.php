<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$stock_id = $_GET['stock_id'];

$ret = mysqli_query($conn, "delete from stock where stock_id = $stock_id");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 삭제 되었습니다');
    // ************* need modify *******
    echo "<meta http-equiv='refresh' content='0;url=corp_listed_corp.php'>";
}

?>