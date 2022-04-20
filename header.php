<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>Toss-Invest</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="listed_corp.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">Toss-Invest</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="기업 통합검색">
                </li>
                <li><a href='site_info.php'>소개</a></li>
                <li><a href='listed_corp.php'>상장법인목록</a></li>
                <li><a href='login_form.php'>로그인</a></li>
            </ul>
        </div>
    </div>
</form>