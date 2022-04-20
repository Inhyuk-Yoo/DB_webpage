<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>

<?php
require_once 'dto.php';

class PMemberDao {
    private $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    
    public function disconnect() {
        $this->conn = null;
    }
    public function insert($p_m) {
        $this->conn = dbconnect($host, $dbid, $dbpass, $dbname);
        try {
            $sql = "insert into private_member values(?,?,?,?,?,?,?,?)";
            $stm = $this->conn->prepare ( $sql );
            $stm->bindValue ( 1, $p_m->getPrivateId () );
            $stm->bindValue ( 2, $p_m->getPrivatePwd () );
            $stm->bindValue ( 3, $p_m->getPrivateName () );
            $stm->bindValue ( 4, $p_m->getPrivateSecnum () );
            $stm->bindValue ( 5, $p_m->getPrivateAddress () );
            $stm->bindValue ( 6, $p_m->getPrivatePhone () );
            $stm->bindValue ( 7, $p_m->getBankId () );
            $stm->bindValue ( 8, $p_m->getAccount () );
            $stm->execute ();
        } catch ( PDOException $e ) {
            print $e->getMessage ();
        }
        $this->disconnect();
    }
    public function select($private_id) {
        $p_m = null;
        $this->conn = dbconnect($host, $dbid, $dbpass, $dbname);
        try {
            $sql = "select * from private_member where private_id=?";
            $stm = $this->conn->prepare ( $sql );
            $stm->bindValue ( 1, $private_id );         
            $stm->execute ();
            $cnt = $stm->rowCount();
            if($cnt > 0){
                $row = $stm->fetch(PDO::FETCH_ASSOC);
                $p_m = new Member($row['private_id'],$row['private_pwd'],$row['private_name'],
                        $row['private_secnum'],$row['private_address'],$row['private_phone'],$row['bank_id'],$row['account']);
            }
        } catch ( PDOException $e ) {
            print $e->getMessage ();
        }
        $this->disconnect();
        return $p_m;
    }
    public function update($p_m) {
        $this->conn = dbconnect($host, $dbid, $dbpass, $dbname);
        try {
            $sql = "update private_member set private_pwd=?, private_secnum=?, private_address=?, private_phone=?, bank_id=?, account=? where private_id=?";
            $stm = $this->conn->prepare ( $sql );
            $stm->bindValue ( 1, $p_m->getPrivatePwd () );
            $stm->bindValue ( 2, $p_m->getPrivateSecnum () );
            $stm->bindValue ( 3, $p_m->getPrivateAddress () );
            $stm->bindValue ( 4, $p_m->getPrivatePhone () );
            $stm->bindValue ( 5, $p_m->getBankId () );
            $stm->bindValue ( 6, $p_m->getAccount () );
            $stm->execute();
        } catch ( PDOException $e ) {
            print $e->getMessage ();
        }
        $this->disconnect();
    }
    public function delete($private_id) {
        $this->conn = dbconnect($host, $dbid, $dbpass, $dbname);
        try {
            $sql = "delete from private_member where private_id=?";
            $stm = $this->conn->prepare ( $sql );
            $stm->bindValue ( 1, $private_id );
            $stm->execute ();
        } catch ( PDOException $e ) {
            print $e->getMessage ();
        }
        $this->disconnect();
    }
}
class CMemberDao {
    private $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    
    public function disconnect() {
        $this->conn = null;
    }
    public function insert($c_m) {
        $this->conn = dbconnect($host, $dbid, $dbpass, $dbname);
        try {
            $sql = "insert into corporation_member values(?,?,?,?,?,?,?,?)";
            $stm = $this->conn->prepare ( $sql );
            $stm->bindValue ( 1, $c_m->getCorpId () );
            $stm->bindValue ( 2, $c_m->getCorpPwd () );
            $stm->bindValue ( 3, $c_m->getCorpName () );
            $stm->bindValue ( 4, $c_m->getCorpSecnum () );
            $stm->bindValue ( 5, $c_m->getCorpAddress () );
            $stm->bindValue ( 6, $c_m->getCorpPhone () );
            $stm->bindValue ( 7, $c_m->getBankId () );
            $stm->bindValue ( 8, $c_m->getAccount () );
            $stm->execute ();
        } catch ( PDOException $e ) {
            print $e->getMessage ();
        }
        $this->disconnect();
    }
    public function select($corp_id) {
        $c_m = null;
        $this->conn = dbconnect($host, $dbid, $dbpass, $dbname);
        try {
            $sql = "select * from corporation_member where corp_id=?";
            $stm = $this->conn->prepare ( $sql );
            $stm->bindValue ( 1, $corp_id );            
            $stm->execute ();
            $cnt = $stm->rowCount();
            if($cnt > 0){
                $row = $stm->fetch(PDO::FETCH_ASSOC);
                $c_m = new Member($row['corp_id'],$row['corp_pwd'],$row['corp_name'],
                        $row['corp_secnum'],$row['corp_address'],$row['corp_phone'],$row['bank_id'],$row['account']);
            }
        } catch ( PDOException $e ) {
            print $e->getMessage ();
        }
        $this->disconnect();
        return $c_m;
    }
    public function update($c_m) {
        $this->conn = dbconnect($host, $dbid, $dbpass, $dbname);
        try {
            $sql = "update corporation_member set corp_pwd=?, corp_secnum=?, corp_address=?, corp_phone=?, bank_id=?, account=? where corp_id=?";
            $stm = $this->conn->prepare ( $sql );
            $stm->bindValue ( 1, $c_m->getCorpPwd () );
            $stm->bindValue ( 2, $c_m->getCorpSecnum () );
            $stm->bindValue ( 3, $c_m->getCorpAddress () );
            $stm->bindValue ( 4, $c_m->getCorpPhone () );
            $stm->bindValue ( 5, $c_m->getBankId () );
            $stm->bindValue ( 6, $c_m->getAccount () );
            $stm->execute();
        } catch ( PDOException $e ) {
            print $e->getMessage ();
        }
        $this->disconnect();
    }
    public function delete($corp_id) {
        $this->conn = dbconnect($host, $dbid, $dbpass, $dbname);
        try {
            $sql = "delete from corporation_member where corp_id=?";
            $stm = $this->conn->prepare ( $sql );
            $stm->bindValue ( 1, $corp_id );
            $stm->execute ();
        } catch ( PDOException $e ) {
            print $e->getMessage ();
        }
        $this->disconnect();
    }
}
?>

<? include("footer.php") ?>