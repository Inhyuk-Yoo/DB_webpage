<?
include "header.php";
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

	<br><h4>상장법인목록</h4>
	<br><p><b>주식거래를 원하시면 해당 회사명을 클릭해주세요.</b></p><br>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>종목코드</th>
            <th>회사명</th>
            <th>업종</th>
            <th>상장일</th>
            <th>시가총액(억)</th>
            <th>매출(억)</th>
            <th>영업이익(억)</th>
            <th>기능</th>
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
            echo "<td width='17%'><a href='login_form.php'>{$row['corp_name']}</a></td>";
            echo "<td>{$row['corp_category']}</td>";
            echo "<td>{$row['listing_date']}</td>";
            echo "<td>{$row['market_cap']}</td>";
            echo "<td>{$row['sales']}</td>";
            echo "<td>{$row['profit']}</td>";
            echo "<td width='17%'>
                <a href='login_form.php'><button class='button primary small'>수정</button></a>
                 <a href='login_form.php'><button class='button danger small'>삭제</button></a>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <!--
    <script>
        function deleteConfirm(corp_num) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "corp_delete.php?corp_num=" + corp_num;
            }else{   //취소
                return;
            }
        }
    </script> -->
</div>

<? include("footer.php") ?>