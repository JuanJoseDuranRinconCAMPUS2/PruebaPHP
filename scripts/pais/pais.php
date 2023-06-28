<?php
    namespace App;
    class pais extends connect{
        private $queryPost= 'INSERT INTO pais(nombrePais) VALUES(:N_Pais)';
        private $queryGetAll = 'SELECT idPais AS "P_id", nombrePais AS "N_Pais" FROM pais';
        private $queryPut = 'UPDATE pais SET nombrePais = :N_Pais WHERE idPais = :P_id';
        private $queryDelete = 'DELETE FROM `pais` WHERE `idPais` = :P_id';
        private $message;
        use getInstance;
        function __construct(private $id = 0, private $nombrePais = 1){parent::__construct();}
        public function postPais(){
            try {
                $res = $this->conx->prepare($this->queryPost);
                $res->bindValue("N_Pais", $this->nombrePais);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se ha enviado exitosamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function getAllPais(){
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
        public function putPais(){
            try {
                $res = $this->conx->prepare($this->queryPut);
                $res->bindValue("P_id", $this->id);
                $res->bindValue("N_Pais", $this->nombrePais);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se ha actualizado correctamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function deletePais(){
            try {
                $res = $this->conx->prepare($this->queryDelete);
                $res->bindValue("P_id", $this->id);
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