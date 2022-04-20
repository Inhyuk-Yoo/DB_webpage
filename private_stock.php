<?
include "private_header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("corp_num", $_GET)) {
    $corp_num = $_GET["corp_num"];
    $query = "select * from stock natural join listed_corp where corp_num = $corp_num";
    $res = mysqli_query($conn, $query);
    $stock = mysqli_fetch_assoc($res);
    if (!$stock) {
        msg("주식이 존재하지 않습니다.");
    }
}
?>
    <div class="container fullwidth">

        <br><h3>주식 정보 상세 보기</h3><br>

		<table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>기업No.</th>
            <th>기업명</th>
            <th>주식No.</th>
            <th>종목코드</th>
            <th>날짜</th>
            <th>시가</th>
            <th>고가</th>
            <th>저가</th>
            <th>종가</th>
            <th>거래량</th>
            <th>거래</th>
            <th>기능</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['corp_num']}</td>";
            echo "<td>{$row['corp_name']}</td>";
            //echo "<td><a href='product_view.php?product_id={$row['product_id']}'>{$row['product_name']}</a></td>";
            echo "<td>{$row['stock_id']}</td>";
            echo "<td>{$row['stock_code']}</td>";
            echo "<td>{$row['stock_date']}</td>";
            echo "<td>{$row['stock_open']}</td>";
            echo "<td>{$row['stock_high']}</td>";
            echo "<td>{$row['stock_low']}</td>";
            echo "<td>{$row['stock_close']}</td>";
            echo "<td>{$row['stock_volume']}</td>";
            echo "<td width='17%'>
                <button class='button primary small'>매수</button>
                 <button onclick='javascript:deleteConfirm({$row['']})' class='button danger small'>매도</button>
                </td>";
            echo "<td width='17%'>
                <button class='button primary small'>수정</button>
                 <button onclick='javascript:deleteConfirm({$row['']})' class='button danger small'>삭제</button>
                </td>";
            //echo "<td width='17%'>
                //<a href='product_form.php?product_id={$row['product_id']}'><button class='button primary small'>수정</button></a>
                 //<button onclick='javascript:deleteConfirm({$row['product_id']})' class='button danger small'>삭제</button>
                //</td>";
            //echo "<td width='17%'>
                //<a href='product_form.php?product_id={$row['product_id']}'><button class='button primary small'>수정</button></a>
                 //<button onclick='javascript:deleteConfirm({$row['product_id']})' class='button danger small'>삭제</button>
                //</td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <!--
    <script>
        function deleteConfirm(stock_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "product_delete.php?product_id=" + product_id;
            }else{   //취소
                return;
            }
        }
    </script> -->

        <!-- <p>
            <label for="stock_id">주식 코드</label>
            <input readonly type="text" id="stock_id" name="stock_id" value="<?= $stock['stock_id'] ?>"/>
        </p>

        <p>
            <label for="corp_num">기업 코드</label>
            <input readonly type="text" id="corp_num" name="corp_num" value="<?= $listed_corp['corp_num'] ?>"/>
        </p>

        <p>
            <label for="corp_name">기업명</label>
            <input readonly type="text" id="corp_name" name="corp_name" value="<?= $product['corp_name'] ?>"/>
        </p>

        <p>
            <label for="product_name">상품명</label>
            <input readonly type="text" id="product_name" name="product_name" value="<?= $product['product_name'] ?>"/>
        </p>

        <p>
            <label for="product_desc">상품설명</label>
            <textarea readonly id="product_desc" name="product_desc" rows="10"><?= $product['product_desc'] ?></textarea>
        </p>

        <p>
            <label for="price">가격</label>
            <input readonly type="number" id="price" name="price" value="<?= $product['price'] ?>"/>
        </p> -->
    </div>
<? include("footer.php") ?>