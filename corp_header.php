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
            <a class='pull-left title' href="corp_main.php">Toss-Invest</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="Toss-Invest 통합검색">
                </li>
                <li><a href='corp_listed_corp.php'>주식거래</a></li>
                <li><a href='corp_form.php'>기업등록</a></li>
                <li><a href='corp_stock_form.php'>주식등록</a></li>
                <li><a href='corp_share_holder.php'>주주확인</a></li>
                <li><a href='index.php'>로그아웃</a></li>
            </ul>
        </div>
    </div>
</form>