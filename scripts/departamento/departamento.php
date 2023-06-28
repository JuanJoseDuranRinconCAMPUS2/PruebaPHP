<?php
    namespace App;
    class departamento extends connect{
        private $queryPost= 'INSERT INTO departamento(nombreDep, idPais) VALUES(:N_departamento, :id_fPais)';
        private $queryGetAll = 'SELECT idDep AS "D_id", nombreDep AS "N_departamento", idPais AS "id_fPais" FROM departamento';
        private $queryPut = 'UPDATE departamento SET nombreDep = :N_departamento, idPais = :id_fPais WHERE idDep = :D_id';
        private $queryDelete = 'DELETE FROM `departamento` WHERE `idDep` = :D_id';
        private $message;
        use getInstance;
        function __construct(private $id = 0, private $nombreDep = 1, private $idPais = 1){parent::__construct();}
        public function postDepartamento(){
            try {
                $res = $this->conx->prepare($this->queryPost);
                $res->bindValue("N_departamento", $this->nombreDep);
                $res->bindValue("id_fPais", $this->idPais);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se ha enviado exitosamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function getAllDepartamento(){
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
        public function putDepartamento(){
            try {
                $res = $this->conx->prepare($this->queryPut);
                $res->bindValue("D_id", $this->id);
                $res->bindValue("N_departamento", $this->nombreDep);
                $res->bindValue("id_fPais", $this->idPais);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se ha actualizado correctamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function deleteDepartamento(){
            try {
                $res = $this->conx->prepare($this->queryDelete);
                $res->bindValue("D_id", $this->id);
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