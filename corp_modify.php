<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$corp_num = $_POST['corp_num'];
$stock_code = $_POST['stock_code'];
$corp_name = $_POST['corp_name'];
$corp_category = $_POST['corp_category'];
$listing_date = $_POST['listing_date'];
$market_cap = $_POST['market_cap'];
$sales = $_POST['sales'];
$profit = $_POST['profit'];

$ret = mysqli_query($conn, "update listed_corp set stock_code = '$stock_code', corp_name = '$corp_name', corp_category = '$corp_category', listing_date = '$listing_date', market_cap = $market_cap, sales = $sales, profit = $profit where corp_num = $corp_num");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=listed_corp.php'>";
}

?>