<?php
include_once 'conexion.php';
class Pokemon
{
    private $numero;
    private $nombre;
    private $tipo;
    private $foto;
    

    public function __construct($nombre, $tipo, $foto, $numero = -1)
    {
        $this->numero = $numero;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->foto = $foto;
    }
    public function get_numero()
    {
        return $this->numero;
    }
    public function get_nombre()
    {
        return $this->nombre;
    }

    public function get_tipo()
    {
        return $this->tipo;
    }
    public function get_foto()
    {
        return $this->foto;
    }
    public function insertarEnBd()
    {
        $c = new Conexion();
        $conex = $c->connect();
        $num = $this->numero;
        $nom = $this->nombre;
        $tip = $this->tipo;
        $fot = $this->foto;
        $sql = "INSERT INTO pokemon (numero, nombre, tipo, foto) 
        VALUES ('$num','$nom','$tip','$fot')";
        $resul = $conex->exec($sql);
        // echo "se han insertado $resul registros";
        return $resul;
    }

    
    public static function getPokedex()
    {
        $pokedex = array();
        $c = new Conexion();
        $conex = $c->connect();
        $sql = "SELECT * FROM pokemon";
        $resul = $conex->query($sql);
        //Compruebo que devuelve alguna línea
        if ($resul->rowCount()) {
            //Mientras queden líneas o registros, los saco en forma de objetos PDO y creo objetos Alumno
            while ($row = $resul->fetch(PDO::FETCH_OBJ)) {
                $pokedex[] = new Pokemon($row->nombre, $row->tipo, $row->foto, $row->numero);
            }
        }
        return $pokedex;
    }
    public static function eliminarDeBd(int $id)
    {
        $c = new Conexion();
        $conex = $c->connect();
        $sql = "DELETE FROM pokemon WHERE numero=$id";
        $resul = $conex->exec($sql);
        // echo "se han borrado $resul registros";
        return $resul;
    }

    
}
