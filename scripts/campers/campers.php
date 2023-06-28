<?php
    namespace App;
    class campers extends connect{
        private $queryPost= 'INSERT INTO campers(nombreCamper, apellidoCamper,fechaNac, idReg) VALUES(:N_camper,:A_camper,:D_nacimiento,:id_fReg)';
        private $queryGetAll = 'SELECT idCamper AS "C_id", nombreCamper AS "N_camper", apellidoCamper AS "A_camper", fechaNac AS "D_nacimiento", idReg AS "id_fReg" FROM campers';
        private $queryPut = 'UPDATE campers SET nombreCamper = :N_camper, apellidoCamper = :A_camper, fechaNac = :D_nacimiento, idReg = :id_fReg WHERE idCamper = :C_id';
        private $queryDelete = 'DELETE FROM `campers` WHERE `idCamper` = :C_id';
        private $message;
        use getInstance;
        function __construct(private $id = 0, private $nombreCamper = 1, private $apellidoCamper = 1, private $fechaNac = "00/00/0000", private $idReg = 1){parent::__construct();}
        public function postCampers(){
            try {
                $res = $this->conx->prepare($this->queryPost);
                $res->bindValue("N_camper", $this->nombreCamper);
                $res->bindValue("A_camper", $this->apellidoCamper);
                $res->bindValue("D_nacimiento", $this->fechaNac);
                $res->bindValue("id_fReg", $this->idReg);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se ha enviado exitosamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function getAllCampers(){
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
        public function putCampers(){
            try {
                $res = $this->conx->prepare($this->queryPut);
                $res->bindValue("C_id", $this->id);
                $res->bindValue("N_camper", $this->nombreCamper);
                $res->bindValue("A_camper", $this->apellidoCamper);
                $res->bindValue("D_nacimiento", $this->fechaNac);
                $res->bindValue("id_fReg", $this->idReg);
                $res->execute();
                $this->message = ["code" => 200+$res->rowCount(), "Message" => "la data se ha actualizado correctamente"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            }finally{
                echo json_encode($this->message);
            }
        }
        public function deleteCampers(){
            try {
                $res = $this->conx->prepare($this->queryDelete);
                $res->bindValue("C_id", $this->id);
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