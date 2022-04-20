<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>Toss-Invest</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="product_list.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="private_main.php">Toss-Invest</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="Toss-Invest 통합검색">
                </li>
                <li><a href='private_mystock.php'>보유주식</a></li>
                <li><a href='private_listed_corp.php'>주식거래</a></li>
                <li><a href='private_account.php'>계좌확인</a></li>
                <li><a href='index.php'>로그아웃</a></li>
            </ul>
        </div>
    </div>
</form>