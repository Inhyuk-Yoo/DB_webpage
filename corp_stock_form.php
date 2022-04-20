<?
include "corp_header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "corp_stock_insert.php";

if (array_key_exists("stock_id", $_GET)) {
    $stock_id = $_GET["stock_id"];
    $query =  "select * from stock where stock_id = $stock_id";
    $res = mysqli_query($conn, $query);
    $stock = mysqli_fetch_array($res);
    if(!$stock) {
        msg("주식이 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "corp_stock_modify.php";
    
    //echo json_encode($product);
}

$listed_corps = array();

$query = "select * from listed_corp";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $listed_corps[$row['corp_num']] = $row['corp_name'];
}

$listed_corps[16] = 'OJW';
// echo json_encode($listed_corps);

?>
    <div class="container">
        <form name="corp_stock_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="stock_id" value="<?=$stock['stock_id']?>"/>
            <br><h3>주식 정보 <?php echo $mode; ?></h3><br>
            <p>
                <label for="corp_num">기업</label>
                <select name="corp_num" id="corp_num">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($listed_corps as $num => $name) {
                            if($num == $stock['corp_num']){
                                echo "<option value='{$num}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$num}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="stock_code">종목코드</label>
                <input type="text" placeholder="종목코드 입력" name="stock_code" value="<?=$stock['stock_code']?>"/>
            </p>
            <p>
                <label for="stock_date">날짜</label>
                <input type="text" placeholder="날짜 입력" name="stock_date" value="<?=$stock['stock_date']?>"/>
            </p>
            <p>
                <label for="stock_open">시가</label>
                <input type="number" placeholder="정수로 입력" id="stock_open" name="stock_open" value="<?=$stock['stock_open']?>" />
            </p>
            <p>
                <label for="stock_high">고가</label>
                <input type="number" placeholder="정수로 입력" id="stock_high" name="stock_high" value="<?=$stock['stock_high']?>" />
            </p>
            <p>
                <label for="stock_low">저가</label>
                <input type="number" placeholder="정수로 입력" id="stock_low" name="stock_low" value="<?=$stock['stock_low']?>" />
            </p>
            <p>
                <label for="stock_close">종가</label>
                <input type="number" placeholder="정수로 입력" id="stock_close" name="stock_close" value="<?=$stock['stock_close']?>" />
            </p>
            <p>
                <label for="stock_volume">거래량</label>
                <input type="number" placeholder="정수로 입력" id="stock_volume" name="stock_volume" value="<?=$stock['stock_volume']?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("corp_num").value == "-1") {
                        alert ("기업을 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("stock_code").value == "") {
                        alert ("종목코드를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("stock_date").value == "") {
                        alert ("날짜를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("stock_open").value == "") {
                        alert ("시가를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("stock_high").value == "") {
                        alert ("고가를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("stock_low").value == "") {
                        alert ("저가를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("stock_close").value == "") {
                        alert ("종가를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("stock_volume").value == "") {
                        alert ("거래량을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>