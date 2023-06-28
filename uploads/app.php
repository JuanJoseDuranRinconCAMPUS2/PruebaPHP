<?php
    namespace App;
    require "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();

    $router->mount("/pais", function() use($router){
        $router->post("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\pais::getInstance($data);
            $ruta->postPais();
        });
        $router->get("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\pais::getInstance($data);
            $ruta->getAllPais();
        });
        $router->put("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\pais::getInstance($data);
            $ruta->putPais();
        });
        $router->delete("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\pais::getInstance($data);
            $ruta->deletePais();
        });
    });
    $router->mount("/departamento", function() use($router){
        $router->post("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\departamento::getInstance($data);
            $ruta->postDepartamento();
        });
        $router->get("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\departamento::getInstance($data);
            $ruta->getAllDepartamento();
        });
        $router->put("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\departamento::getInstance($data);
            $ruta->putDepartamento();
        });
        $router->delete("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\departamento::getInstance($data);
            $ruta->deleteDepartamento();
        });
    });
    $router->mount("/region", function() use($router){
        $router->post("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\region::getInstance($data);
            $ruta->postRegion();
        });
        $router->get("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\region::getInstance($data);
            $ruta->getAllRegion();
        });
        $router->put("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\region::getInstance($data);
            $ruta->putRegion();
        });
        $router->delete("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\region::getInstance($data);
            $ruta->deleteRegion();
        });
    });
    $router->mount("/campers", function() use($router){
        $router->post("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\campers::getInstance($data);
            $ruta->postCampers();
        });
        $router->get("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\campers::getInstance($data);
            $ruta->getAllCampers();
        });
        $router->put("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\campers::getInstance($data);
            $ruta->putCampers();
        });
        $router->delete("/", function(){
            $data = json_decode(file_get_contents("php://input"), true);
            $ruta = \App\campers::getInstance($data);
            $ruta->deleteCampers();
        });
    });
    $router->run();
?>