<?
include "corp_header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "corp_insert.php";

if (array_key_exists("corp_num", $_GET)) {
    $corp_num = $_GET["corp_num"];
    $query =  "select * from listed_corp where corp_num = $corp_num";
    $res = mysqli_query($conn, $query);
    $listed_corp = mysqli_fetch_array($res);
    if(!$listed_corp) {
        msg("기업이 존재하지 않습니다.");
    }
    $mode = "수정";
    $action = "corp_modify.php";
    
    //echo json_encode($product);
}

?>
    <div class="container">
        <form name="corp_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="corp_num" value="<?=$listed_corp['corp_num']?>"/>
            <br><h3>기업 정보 <?php echo $mode; ?></h3><br>
            
            <p>
                <label for="stock_code">종목코드</label>
                <input type="text" placeholder="종목코드 입력" name="stock_code" value="<?=$listed_corp['stock_code']?>"/>
            </p>
            <p>
                <label for="corp_name">기업명</label>
                <input type="text" placeholder="기업명 입력" name="corp_name" value="<?=$listed_corp['corp_name']?>"/>
            </p>
            <p>
                <label for="corp_category">업종</label>
                <input type="text" placeholder="업종 입력" name="corp_category" value="<?=$listed_corp['corp_category']?>"/>
            </p>
            <p>
                <label for="listing_date">상장일</label>
                <input type="text" placeholder="상장일 입력" name="listing_date" value="<?=$listed_corp['listing_date']?>"/>
            </p>
            <p>
                <label for="market_cap">시가총액</label>
                <input type="number" placeholder="정수로 입력(억)" id="market_cap" name="market_cap" value="<?=$listed_corp['market_cap']?>" />
            </p>
            <p>
                <label for="sales">매출</label>
                <input type="number" placeholder="정수로 입력(억)" id="sales" name="sales" value="<?=$listed_corp['sales']?>" />
            </p>
            <p>
                <label for="profit">영업이익</label>
                <input type="number" placeholder="정수로 입력(억)" id="profit" name="profit" value="<?=$listed_corp['profit']?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("stock_code").value == "") {
                        alert ("종목코드를 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("corp_name").value == "") {
                        alert ("기업명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("corp_category").value == "") {
                        alert ("업종을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("listing_date").value == "") {
                        alert ("상장일을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("market_cap").value == "") {
                        alert ("시가총액을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("sales").value == "") {
                        alert ("매출을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("profit").value == "") {
                        alert ("영업이익을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>