<?php
    namespace App;
    class region extends connect{
        private $queryPost= 'INSERT INTO region(nombreReg, idDep) VALUES(:N_region, :id_fDep)';
        private $queryGetAll = 'SELECT idReg AS "R_id", nombreReg AS "N_region", idDep AS "id_fDep" FROM region';
        private $queryPut = 'UPDATE region SET nombreReg = :N_region, idDep = :id_fDep WHERE idReg = :R_id';
        private $queryDelete = 'DELETE FROM `region` WHERE `idReg` = :R_id';
        private $message;
        use getInstance;
        function __construct(private $id = 0, private $nombreReg = 1, private $idDep = 1){parent::__construct();}
        public function postRegion(){
            try {
                $res = $this->conx->prepare($this->queryPost);
                $res->bindValue("N_region", $this->nombreReg);
                $res->bindValue("id_fDep", $this->idDep);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se ha enviado exitosamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function getAllRegion(){
            try {
                $res = $this->conx->prepare($this->queryGetAll);
                $res->execute();
                $this->message = $res->fetchAll(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function putRegion(){
            try {
                $res = $this->conx->prepare($this->queryPut);
                $res->bindValue("R_id", $this->id);
                $res->bindValue("N_region", $this->nombreReg);
                $res->bindValue("id_fDep", $this->idDep);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se ha actualizado correctamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function deleteRegion(){
            try {
                $res = $this->conx->prepare($this->queryDelete);
                $res->bindValue("R_id", $this->id);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se eliminado exitosamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
    }
?>