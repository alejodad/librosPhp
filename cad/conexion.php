<?php


class conexion {
    public static function conectar() {
        return new mysqli('localhost:3306', 'root', 'dad931106', 'librodb');
    }
}
