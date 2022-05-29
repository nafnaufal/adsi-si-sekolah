<?php
    class Koneksi{
        private static $USERNAME = "root";
        private static $PASSWORD = "rian";
        private static $DATABASE = "sekolah";
        private static $HOSTNAME = "localhost";
        private static $connection = NULL;

        public static function getConnection(){
            Koneksi::$connection = mysqli_connect(Koneksi::$HOSTNAME, Koneksi::$USERNAME, Koneksi::$PASSWORD, Koneksi::$DATABASE);
            return Koneksi::$connection;
        }
        public static function destroyConnection(){
            Koneksi::$connection = NULL;
        }
    }
?>