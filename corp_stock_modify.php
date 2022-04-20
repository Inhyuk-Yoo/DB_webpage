<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$stock_id = $_POST['stock_id'];
$stock_code = $_POST['stock_code'];
$stock_date = $_POST['stock_date'];
$corp_num = $_POST['corp_num'];
$stock_open = $_POST['stock_open'];
$stock_high = $_POST['stock_high'];
$stock_low = $_POST['stock_low'];
$stock_close = $_POST['stock_close'];
$stock_volume = $_POST['stock_volume'];


$ret = mysqli_query($conn, "update stock set stock_code = '$stock_code', stock_date = '$stock_date', corp_num = $corp_num, stock_open = $stock_open, stock_high = $stock_high, stock_low = $stock_low, stock_close = $stock_close, stock_volume = $stock_volume where stock_id = $stock_id");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 수정 되었습니다');
    // ************ need modify ********
    echo "<meta http-equiv='refresh' content='0;url=listed_corp.php'>";
}

?>