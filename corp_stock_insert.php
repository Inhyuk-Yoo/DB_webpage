<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$stock_code = $_POST['stock_code'];
$stock_date = $_POST['stock_date'];
$corp_num = $_POST['corp_num'];
$stock_open = $_POST['stock_open'];
$stock_high = $_POST['stock_high'];
$stock_low = $_POST['stock_low'];
$stock_close = $_POST['stock_close'];
$stock_volume = $_POST['stock_volume'];

echo "insert into stock (stock_code, stock_date, corp_num, stock_open, stock_high, stock_low, stock_close, stock_volume) values('$stock_code', '$stock_date', '$corp_num', '$stock_open', '$stock_high', '$stock_low', '$stock_close', '$stock_volume')";

$ret = mysqli_query($conn, "insert into stock (stock_code, stock_date, corp_num, stock_open, stock_high, stock_low, stock_close, stock_volume) values('$stock_code', '$stock_date', '$corp_num', '$stock_open', '$stock_high', '$stock_low', '$stock_close', '$stock_volume')");
if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    // ******** need modify **********
    echo "<meta http-equiv='refresh' content='0;url=private_stock.php'>";
}

?>
