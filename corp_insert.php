<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$stock_code = $_POST['stock_code'];
$corp_name = $_POST['corp_name'];
$corp_category = $_POST['corp_category'];
$listing_date = $_POST['listing_date'];
$market_cap = $_POST['market_cap'];
$sales = $_POST['sales'];
$profit = $_POST['profit'];

echo "insert into listed_corp (stock_code, corp_name, corp_category, listing_date, market_cap, sales, profit) values('$stock_code', '$corp_name', '$corp_category', '$listing_date', '$market_cap', '$sales', '$profit')";

$ret = mysqli_query($conn, "insert into listed_corp (stock_code, corp_name, corp_category, listing_date, market_cap, sales, profit) values('$stock_code', '$corp_name', '$corp_category', '$listing_date', '$market_cap', '$sales', '$profit')");
if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=corp_listed_corp.php'>";
}

?>