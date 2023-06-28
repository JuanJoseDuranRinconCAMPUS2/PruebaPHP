<?php
    namespace App;
    abstract class credentials{
        //CREDENCIALES CAMPUS
        // protected $host = '172.16.48.204';
        // private $username = 'campus';
        // private $password = '2023';
        // protected $dbname = 'campuslands';
        //CREDENCIALES LOCAL
        protected $host = 'localhost';
        private $username = 'root';
        private $password = '';
        protected $dbname = 'campuslands';
        public function __get($name){
            return $this->{$name};
        }
    }
?>