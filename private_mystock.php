<?
include "private_header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>

<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from listed_corp";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where stock_code like '%$search_keyword%' or corp_name like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

	<br><h4>내 보유주식</h4>
	<br><p><b>내 id : </b></p><br>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>주식No.</th>
            <th>종목코드</th>
            <th>회사명</th>
            <th>매수량</th>
            <th>매수가격</th>
            <th>매도량</th>
            <th>매도가격</th>
            <th>현재 보유량</th>
            <th>거래</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['stock_code']}</td>";
            // needed edit
            //echo "<td><a href='product_view.php?corp_num={$row['corp_num']}'>{$row['corp_name']}</a></td>";
            echo "<td width='17%'><a href='trading.php'>{$row['corp_name']}</a></td>";
            echo "<td>{$row['corp_category']}</td>";
            echo "<td>{$row['listing_date']}</td>";
            echo "<td>{$row['market_cap']}</td>";
            echo "<td>{$row['sales']}</td>";
            echo "<td>{$row['profit']}</td>";
            echo "<td width='17%'>
                <a href='corp_form.php?corp_num={$row['corp_num']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['corp_num']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(corp_num) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "corp_delete.php?corp_num=" + corp_num;
            }else{   //취소
                return;
            }
        }
    </script>
</div>

<? include("footer.php") ?>