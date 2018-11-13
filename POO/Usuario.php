<?php

class usuario
{
    use Saludador;

    public const ADMIN = 'admin';   # se define a nivel de clase.

    public $id;                     # variable de instancia.
    public $login;
    public $password;
    public static $cantidad = 0;    # variable de clase.

    public function __contruct($id)
    {
        require_once '/comunes/auxiliar.php';
        $pdo = conectar();
        $usuario = buscarUsuario($pdo, $id);
        $this->id = $usuario['id'];
        $this->login = $usuario['login'];
        $this->password = $usuario['password'];
        self::$cantidad++;
    }

    public function __destruct()
    {
        self::$cantidad--;
    }

    public function deslogear()
    {
        $nombre = $this->login;
        echo "Ya está deslogueado $nombre";
    }

    public static function nombreAdmin()
    {
        return self::ADMIN; # self hace referencia a la clase actual, ¡ojo! no es equivalente al $this.
    }

    public static function quienSoy(){
        return __CLASS__;
    }

    public static function prueba(){
        return static::quienSoy();  # vamos a usar siempre static cuando
                                    # queremos usar un método estatico desde una
                                    # clase heredera. En caso de que nos interese
                                    # que todas las hijas acedan a la version
                                    # definida en la clase actual usaremos el
                                    # self.
    }

}
