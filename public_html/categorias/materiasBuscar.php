<?php

ini_set('log_errors', 1); // Habilita el registro de errores
ini_set('error_log', 'archivo-de-registro.log');
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = 'db5013309636.hosting-data.io';
        $this->db       = 'dbs11162154';
        $this->user     = 'dbu5692069';
        $this->password = '7$a%WsD@%AMZiZ7YZ5N!hT';
        $this->charset  = 'utf8mb4';
    }

    function connect(){
    
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}
class Materias extends DB
{
    public function obtenerMateriasPorGrupo($idGrupo)
    {
        $query = $this->connect()->prepare("SELECT m.id_materia, c.Nombre as Carrera, m.nombre AS nombre_materia, mg.id_grupo, g.Clave AS nombre_grupo
                  FROM materia_grupo mg
                  JOIN materia m ON mg.id_materia = m.id_materia
                  JOIN grupo g ON mg.id_grupo = g.id_grupo
                  JOIN carrera c ON g.id_carrera = c.id_carrera
                  WHERE mg.id_grupo = :idGrupo
                  GROUP BY m.id_materia, m.nombre, mg.id_grupo, g.Clave
                  ORDER BY `id_grupo` ASC");

        $query->bindValue(':idGrupo', $idGrupo, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}

class Grupos extends DB {
    private $id_carrera = [];
    private $Nombre = [];
    private $Clave = [];
    private $Cuatrimestre = [];
    private $id_grupo = [];
    private $id_periodo = [];
    public function getTiempo($fecha)
    {
        $timestamp = strtotime($fecha);
        $now = time();
        $difference = $now - $timestamp;

        if ($difference >= 86400) { // Más de un día
            $days = floor($difference / 86400);
            return "$days día(s)";
        } elseif ($difference >= 3600) { // Más de una hora
            $hours = floor($difference / 3600);
            return "$hours hora(s)";
        } elseif ($difference >= 60) { // Más de un minuto
            $minutes = floor($difference / 60);
            return "$minutes minuto(s)";
        } else { // Menos de un minuto
            return "unos segundos";
        }
    }
    public function Grupos() {
        $query = $this->connect()->prepare('SELECT * FROM grupo');
        $query->execute();
        foreach ($query as $Grupos) {
            $this->id_carrera[] = $Grupos['id_carrera'];
            $this->Nombre[] = $Grupos['Nombre'];
            $this->Clave[] = $Grupos['Clave'];
            $this->Cuatrimestre[] = $Grupos['Cuatrimestre'];
            $this->id_grupo[] = $Grupos['id_grupo'];
            $this->id_periodo[] = $Grupos['id_periodo'];
        }

    }
    public function getTotal() {
                return end($this->id_grupo);

        }    
    public function getIdGrupo($index) {
        return $this->id_grupo[$index];
    }
    public function getClave($index) {
        return $this->Clave[$index];
    }
    public function getNombre($index) {
        return $this->Nombre[$index];
    }
    public function getCuatrimestre($index) {
        return $this->Cuatrimestre[$index];
    }
    public function getPeriodo($index) {
        return $this->id_periodo[$index];
    }
    public function getIdCarrera($index) {
        return $this->id_periodo[$index];
    }
}
class UsuariosGrupo extends DB {
    private $GrupoS = [];
    public function getUsuarioGrupo($grupo)
    {
        $consultaA = 'SELECT id_usuario FROM usurario_grupo where id_grupo = ' . $grupo;
        $query = $this->connect()->prepare($consultaA);
        $query->execute();
        foreach ($query as $UsuarioG) {
            $this->GrupoS[] = $UsuarioG['id_usuario'];
        }
    }
    public function getIdU($index)
    {
        return $this->GrupoS[$index];
    }
    public function getTotal() {
        return count($this->GrupoS);
    }
}
class Usuarios extends DB {
    private $nombre = [];
    private $ApellidoP = [];
    private $ApellidoM = [];
    private $Genero = [];
    private $Correo = [];
    private $Matricula = [];
    private $Foto = [];
    private $Portada = [];
    private $id_rol = [];
    private $id_usuario = [];
    private $telefono = [];
    private $Fecha_creacion = [];
    private $Fecha_modificacion = [];
    private $Activo = [];
    private $GrupoR = [];
    private $GrupoN = [];
    private $retornoID = [];
    private $Fecha_nacimiento = [];
public function getUsuarioCarrera($carrera) {
           $consultaA = 'SELECT id_grupo, Clave FROM grupo where id_carrera = '.$carrera;
    $query = $this->connect()->prepare($consultaA);
        $query->execute();
        foreach ($query as $UsuarioG) {
            $this->GrupoR[] = $UsuarioG['id_grupo'];
            $this->GrupoN[] = $UsuarioG['Clave'];
        }
        for ($j=0;$j<count($this->GrupoR); $j++) {
            
            $consultaE = 'SELECT id_usuario FROM usurario_grupo where id_grupo = '.$this->GrupoR[$j];
    $query = $this->connect()->prepare($consultaE);
        $query->execute();
        foreach ($query as $UsuarioG) {
            $this->retornoID[] = $UsuarioG['id_usuario'];
        }
        }
}

public function getNombreGrupo($index) {
    return $this->GrupoN[$index];
}
public function getTotalUC() {
    return count($this->retornoID);
}
public function getIdUsuarioG($index) {
return $this->retornoID[$index];
}
    public function getUsuarios($consulta, $id_user){
        if ($consulta == 1) {
            $consultaE = 'SELECT * FROM usuario';
        } else if ($consulta == 2) {
            $consultaE = 'SELECT * FROM usuario WHERE id_usuario = '.$id_user;
        }
        $query = $this->connect()->prepare($consultaE);
        $query->execute();
        
        foreach ($query as $Usuario) {
            $this->id_usuario[] = $Usuario['id_usuario'];
            $this->nombre[] = $Usuario['Nombre'];
            $this->ApellidoP[] = $Usuario['Apellido_paterno'];
            $this->ApellidoM[] = $Usuario['Apellido_materno'];
            $this->Genero[] = $Usuario['Genero'];
            $this->Correo[] = $Usuario['Correo'];
            $this->Matricula[] = $Usuario['Matricula'];
            $this->Foto[] = $Usuario['Foto'];
            $this->Portada[] = $Usuario['Portada'];
            $this->id_rol[] = $Usuario['id_rol'];
            $this->telefono[] = $Usuario['Telefono'];
            $this->Fecha_creacion[] = $Usuario['Fecha_creacion'];
            $this->Fecha_modificacion[] = $Usuario['Fecha_modificacion'];
            $this->Activo[] = $Usuario['Activo'];
            $this->Fecha_nacimiento[] = $Usuario['Fecha_nacimiento'];
        }
    }

    public function getNombre($index) {
        return $this->nombre[$index];
    }
    public function getApellidoPaterno($index) {
        return $this->ApellidoP[$index];
    }
    
    public function getApellidoMaterno($index) {
        return $this->ApellidoM[$index];
    }
    
    public function getGenero($index) {
        return $this->Genero[$index];
    }
    
    public function getCorreo($index) {
        return $this->Correo[$index];
    }
    
    public function getMatricula($index) {
        return $this->Matricula[$index];
    }
    
    public function getFoto($index) {
        return $this->Foto[$index];
    }
    
    public function getIdRol($index) {
        return $this->id_rol[$index];
    }
    public function getPortada($index) {
        return $this->Portada[$index];
    }
    public function getTelefono($index) {
        return $this->telefono[$index];
    }
    
    public function getFechaCreacion($index) {
        return $this->Fecha_creacion[$index];
    }
    
    public function getFechaModificacion($index) {
        if ($this->Fecha_modificacio[$index] == "") {
            $this->Fecha_modificacion[$index] = "No se han hecho modificaciones.";
        }
        return $this->Fecha_modificacio[$index];
    }
    
    public function getActivo($index) {
        if ($this->Activo == "1") {
            $this->Activo = "Activo";
        } else {
            $this->Activo = "Inactivo";
        }
        return $this->Activo[$index];
    }
    
    public function getFechaNacimiento($index) {
        return $this->Fecha_nacimiento;
    }
    public function getTiempo($fecha)
    {
        $timestamp = strtotime($fecha);
        $now = time();
        $difference = $now - $timestamp;

        if ($difference >= 86400) { // Más de un día
            $days = floor($difference / 86400);
            return "$days día(s)";
        } elseif ($difference >= 3600) { // Más de una hora
            $hours = floor($difference / 3600);
            return "$hours hora(s)";
        } elseif ($difference >= 60) { // Más de un minuto
            $minutes = floor($difference / 60);
            return "$minutes minuto(s)";
        } else { // Menos de un minuto
            return "unos segundos";
        }
    }
    public function getIdUsuario($index) {
        return $this->id_usuario;
    }
}
class Dashboard extends DB
{
    private $nombre = [];

    public function getTables()
    {
        try {
            $stmt = $this->connect()->query("SHOW TABLES FROM dbs11162154");
            $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $this->nombre = $tables;
        } catch (PDOException $e) {
        }
    }

    public function getNombre($index)
    {
        return isset($this->nombre[$index]) ? $this->nombre[$index] : null;
    }

    public function getTotal()
    {
        return count($this->nombre);
    }
}


class Carreras extends DB {
    private $id_carrera = [];
    private $Nombre = [];
    private $Clave = [];
    public function AgregarCarrera($Clave, $Nombre) {
    $query = $this->connect()->prepare('INSERT INTO `carrera` (`id_carrera`, `Clave`, `Nombre`) VALUES (NULL, :Clave, :Nombre)');
        $query->execute([
            'Clave' => $Clave,
            'Nombre' => $Nombre
        ]);

    }
    public function Carreras() {
        $query = $this->connect()->prepare('SELECT * FROM carrera');
        $query->execute();
        foreach ($query as $Carreras) {
            $this->id_carrera[] = $Carreras['id_carrera'];
            $this->Nombre[] = $Carreras['Nombre'];
            $this->Clave[] = $Carreras['Clave'];
        }
    }
    public function getTiempo($fecha)
    {
        $timestamp = strtotime($fecha);
        $now = time();
        $difference = $now - $timestamp;

        if ($difference >= 86400) { // Más de un día
            $days = floor($difference / 86400);
            return "$days día(s)";
        } elseif ($difference >= 3600) { // Más de una hora
            $hours = floor($difference / 3600);
            return "$hours hora(s)";
        } elseif ($difference >= 60) { // Más de un minuto
            $minutes = floor($difference / 60);
            return "$minutes minuto(s)";
        } else { // Menos de un minuto
            return "unos segundos";
        }
    }
    public function getTotal() {
        return count($this->id_carrera);
    }
    public function getIdCarrera($index) {
        return $this->id_carrera[$index];
    }
    public function getNombre($index)
    {
        return $this->Nombre[$index];
    }

    public function getClave($index)
    {
        return $this->Clave[$index];
    }
}

class Respuestas extends DB {
private $id_respuesta = [];
private $id_publicacion = [];
private $Fecha_respuesta = [];
private $id_usuario = [];
private $Respuesta = [];
public function Respuestas($id_publicacion) {
    $query = $this->connect()->prepare('SELECT * FROM publicaciones_respuestas where id_publicacion = :id_publicacion');
    $query->execute([
        'id_publicacion' => $id_publicacion
    ]);
            foreach ($query as $Publicaciones) {
            $this->id_publicacion[] = $Publicaciones['id_publicacion'];
            $this->id_respuesta[] = $Publicaciones['id_respuesta'];
            $this->id_usuario[] = $Publicaciones['id_usuario'];
            $this->Respuesta[] = $Publicaciones['Respuesta'];
            $this->Fecha_respuesta[] = $Publicaciones['Fecha_respuesta'];
        }

}
public function getTotal() {
    return count($this->id_publicacion);
}
    public function getTiempo($fecha)
    {
        $timestamp = strtotime($fecha);
        $now = time();
        $difference = $now - $timestamp;

        if ($difference >= 86400) { // Más de un día
            $days = floor($difference / 86400);
            return "$days día(s)";
        } elseif ($difference >= 3600) { // Más de una hora
            $hours = floor($difference / 3600);
            return "$hours hora(s)";
        } elseif ($difference >= 60) { // Más de un minuto
            $minutes = floor($difference / 60);
            return "$minutes minuto(s)";
        } else { // Menos de un minuto
            return "unos segundos";
        }
    }
public function getIdRespuesta($index) {
    return $this->id_respuesta[$index];
}
public function getIdPublicacion($index){
    return $this->id_publicacion[$index];
}
public function getIdUsuario($index) {
    return $this->id_usuario[$index];
}
public function getRespuesta($index) {
    return $this->Respuesta[$index];
}
public function getFechaRespuesta($index) {
    return $this->Fecha_respuesta[$index];
}
public function crearRespuesta($id_usuario, $id_publicacion, $Respuesta) {
    $query = $this->connect()->prepare('INSERT INTO `publicaciones_respuestas` (`id_respuesta`, `id_publicacion`, `id_usuario`, `Respuesta`, `Fecha_respuesta`) VALUES (NULL, :id_publicacion, :id_usuario, :Respuesta, CURRENT_TIMESTAMP)');
    $query->execute([
        'id_publicacion' => $id_publicacion,
        'id_usuario' => $id_usuario,
        'Respuesta' => $Respuesta
    ]);
}

private $numero = [];
public function cantidadRespuestas($id_publicacion) {
    $query = $this->connect()->prepare('SELECT COUNT(id_publicacion) AS Respuesta FROM publicaciones_respuestas WHERE id_publicacion = :id_publicacion');
    $query->execute([
        'id_publicacion' => $id_publicacion]);
        foreach ($query as $Publicaciones) {
            $this->numero[] = $Publicaciones['Respuesta'];
        }
    }
public function getCantidadRespuestas($index) {
    return $this->numero[$index];
} 
}
class Publicaciones extends DB {
    public function crearPublicacion($titulo, $Contenido, $ContenidoText, $id_usuario, $Activo, $id_carrera, $id_cuatrimestre, $Publica) {
        $query = $this->connect()->prepare('INSERT INTO `publicaciones` (`id_publicacion`, `titulo`, `Contenido`, `ContenidoText`, `id_usuario`, `Fecha_creacion`, `Fecha_modificacion`, `Activo`, `id_carrera`, `id_cuatrimestre`, `Publica`) VALUES (NULL, :titulo, :Contenido, :ContenidoText, :id_usuario, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :Activo, :id_carrera, :id_cuatrimestre, :publica)');
        $query->execute([
            'titulo' => $titulo,
            'Contenido' => $Contenido,
            'ContenidoText' => $ContenidoText,
            'id_usuario' => $id_usuario,
            'Activo' => $Activo,
            'id_carrera' => $id_carrera,
            'id_cuatrimestre' => $id_cuatrimestre,
            'Publica' => $Publica
        ]);
        $lastInsertedIdQuery = $this->connect()->prepare('SELECT MAX(id_publicacion) as last_id FROM publicaciones');
        $lastInsertedIdQuery->execute();
        $lastInsertedIdResult = $lastInsertedIdQuery->fetch(PDO::FETCH_ASSOC);

        return $lastInsertedIdResult['last_id'];
    }
    
    private $id_publicacion = [];
    private $titulo = [];
    private $Contenido = [];
    private $ContenidoText = [];
    private $id_usuario = [];
    private $Fecha_creacion = [];
    private $Fecha_modificacion = [];
    private $Activo = [];
    private $id_carrera = [];
    private $id_cuatrimestre = [];
    
    public function Publicaciones($consulta, $id_publicacion) {
        if ($consulta == 1) {
            $consultaE = 'SELECT * FROM publicaciones ORDER BY id_publicacion DESC';
        } else if ($consulta == "desc"){
            $consultaE = 'SELECT * FROM publicaciones';
        } else if ($consulta == 2) {
            $consultaE = 'SELECT * FROM publicaciones WHERE id_usuario = ' . $id_publicacion.' ORDER BY id_usuario DESC';
        } else if ($consulta == 10) {
            $consultaE = 'SELECT * FROM publicaciones WHERE id_publicacion = '.$id_publicacion;
        } else if ($consulta == "c"){
            $consultaE = 'SELECT * FROM publicaciones WHERE id_carrera = '.$id_publicacion.' order by id_publicacion desc';
        } else if ($consulta == "cu") {
            $consultaE = 'SELECT * FROM publicaciones WHERE id_cuatrimestre = '.$id_publicacion. ' order by id_publicacion desc';
        } else if ($consulta == "dsm") {
            $consultaE = 'SELECT * FROM publicaciones WHERE id_carrera = ' . $id_publicacion . ' order by id_publicacion desc';
        } else if ($consulta == "igdsm") {
            $consultaE = 'SELECT * FROM publicaciones WHERE id_carrera = ' . $id_publicacion . ' order by id_publicacion desc';
        } else if ($consulta == "igird") {
            $consultaE = 'SELECT * FROM publicaciones WHERE id_carrera = ' . $id_publicacion . ' order by id_publicacion desc';
        } else if ($consulta == "ird") {
            $consultaE = 'SELECT * FROM publicaciones WHERE id_carrera = ' . $id_publicacion . ' order by id_publicacion desc';
        }
        $query = $this->connect()->prepare($consultaE);
        $query->execute();
        foreach ($query as $Publicaciones) {
            $this->id_publicacion[] = $Publicaciones['id_publicacion'];
            $this->titulo[] = $Publicaciones['titulo'];
            $this->Contenido[] = $Publicaciones['Contenido'];
            $this->ContenidoText[] = $Publicaciones['ContenidoText'];
            $this->id_usuario[] = $Publicaciones['id_usuario'];
            $this->Fecha_creacion[] = $Publicaciones['Fecha_creacion'];
            $this->Fecha_modificacion[] = $Publicaciones['Fecha_modificacion'];
            $this->Activo[] = $Publicaciones['Activo'];
            $this->id_carrera[] = $Publicaciones['id_carrera'];
            $this->id_cuatrimestre[] = $Publicaciones['id_cuatrimestre'];
        }
    }
    public function getIdPublicacion($index)
    {
        return $this->id_publicacion[$index];
    }
    
    public function getTitulo($index)
    {
        return $this->titulo[$index];
    }
    
    public function getContenido($index) {
        return $this->Contenido[$index];
    }
    
    public function getContenidoText($index)
    {
        return $this->ContenidoText[$index];
    }

    public function getIdUsuario($index)
    {
        return $this->id_usuario[$index];
    }

    public function getFechaCreacion($index)
    {
        return $this->Fecha_creacion[$index];
    }
    
    public function getFechaModificacion($index)
    {
        return $this->Fecha_modificacion[$index];
    }
    
    public function getActivo($index)
    {
        return $this->Activo[$index];
    }
    
    public function getIdCarrera($index)
    {
        return $this->id_carrera[$index];
    }

    public function getIdCuatrimestre($index)
    {
        switch ($this->id_cuatrimestre[$index]) {
            case 1:
                $this->id_cuatrimestre[$index] = "Primer cuatrimestre";
                break;
                case 2:
                $this->id_cuatrimestre[$index] = "Segundo cuatrimestre";
                break;
                case 3:
                    $this->id_cuatrimestre[$index] = "Tercer cuatrimestre";
                    break;
                    case 4:
                        $this->id_cuatrimestre[$index] = "Cuarto cuatrimestre";
                        break;
                        case 5:
                            $this->id_cuatrimestre[$index] = "Quinto cuatrimestre";
                            break;
                            case 6:
                                $this->id_cuatrimestre[$index] = "Sexto cuatrimestre";
                                break;
            case 7:
                $this->id_cuatrimestre[$index] = "Séptimo cuatrimestre";
                break;
            case 8:
                $this->id_cuatrimestre[$index] = "Octavo cuatrimestre";
                break;
                case 9:
                    $this->id_cuatrimestre[$index] = "Noveno cuatrimestre";
                break;
            case 10:
                $this->id_cuatrimestre[$index] = "Décimo cuatrimestre";
                break;
                case 11:
                    $this->id_cuatrimestre[$index] = "Onceavo cuatrimestre";
                    break;
                    default:
                    $this->id_cuatrimestre[$index] = "Cuatrimestre no especificado";
                    break;
                }
                return $this->id_cuatrimestre[$index];
            }
    public function getTiempo($fecha)
    {
        $timestamp = strtotime($fecha);
        $now = time();
        $difference = $now - $timestamp;

        if ($difference >= 86400) { // Más de un día
            $days = floor($difference / 86400);
            return "$days día(s)";
        } elseif ($difference >= 3600) { // Más de una hora
            $hours = floor($difference / 3600);
            return "$hours hora(s)";
        } elseif ($difference >= 60) { // Más de un minuto
            $minutes = floor($difference / 60);
            return "$minutes minuto(s)";
        } else { // Menos de un minuto
            return "unos segundos";
        }
    }
public function getTotal()
{
    return count($this->id_cuatrimestre);
}

}


class Usuario extends DB {
    private $nombre;
    private $ApellidoP;
    private $ApellidoM;
    private $Genero;
    private $Correo;
    private $Matricula;
    private $Foto;
    private $Portada;
    private $id_rol;
    private $id_usuario;
    private $telefono;
    private $Fecha_creacion;
    private $Fecha_modificacion;
    private $Activo;
    private $Fecha_nacimiento;
    public function updateTelefono($Telefono, $id_usuario)
    {
        $query = $this->connect()->prepare('UPDATE usuario SET Fecha_Modificacion = NOW() WHERE id_usuario = :id_usuario');
        $query->execute([
            'id_usuario' => $id_usuario
        ]);
        $query2 = $this->connect()->prepare('UPDATE usuario SET Telefono = :Telefono WHERE id_usuario = :id_usuario');
        $query2->execute([
            'Telefono' => $Telefono,
            'id_usuario' => $id_usuario
        ]);
    }
    public function updateFechaNacimiento($Fecha_nacimiento, $id_usuario)
    {
        $query = $this->connect()->prepare('UPDATE usuario SET Fecha_Modificacion = NOW() WHERE id_usuario = :id_usuario');
        $query->execute([
            'id_usuario' => $id_usuario
        ]);
        $query2 = $this->connect()->prepare('UPDATE usuario SET Fecha_nacimiento = :Fecha_nacimiento WHERE id_usuario = :id_usuario');
        $query2->execute([
            'Fecha_nacimiento' => $Fecha_nacimiento,
            'id_usuario' => $id_usuario
        ]);
    }
    public function updateMatricula($Matricula, $id_usuario)
    {
        $query = $this->connect()->prepare('UPDATE usuario SET Fecha_Modificacion = NOW() WHERE id_usuario = :id_usuario');
        $query->execute([
            'id_usuario' => $id_usuario
        ]);
        $query2 = $this->connect()->prepare('UPDATE usuario SET Matricula = :Matricula WHERE id_usuario = :id_usuario');
        $query2->execute([
            'Matricula' => $Matricula,
            'id_usuario' => $id_usuario
        ]);
    }
    public function updateGenero($Genero, $id_usuario)
    {
        $query = $this->connect()->prepare('UPDATE usuario SET Fecha_Modificacion = NOW() WHERE id_usuario = :id_usuario');
        $query->execute([
            'id_usuario' => $id_usuario
        ]);
        $query2 = $this->connect()->prepare('UPDATE usuario SET Genero = :Genero WHERE id_usuario = :id_usuario');
        $query2->execute([
            'Genero' => $Genero,
            'id_usuario' => $id_usuario
        ]);
    }
    public function updateApellidoMaterno($apellidoMaterno, $id_usuario) {
        $query = $this->connect()->prepare('UPDATE usuario SET Fecha_Modificacion = NOW() WHERE id_usuario = :id_usuario');
        $query->execute([
            'id_usuario' => $id_usuario
        ]);
        $query2 = $this->connect()->prepare('UPDATE usuario SET Apellido_materno = :apellidoMaterno WHERE id_usuario = :id_usuario');
        $query2->execute([
            'apellidoMaterno' => $apellidoMaterno,
            'id_usuario' => $id_usuario
        ]);
    }
    public function updateApellidoPaterno($apellidoPaterno, $id_usuario) {
        $query = $this->connect()->prepare('UPDATE usuario SET Fecha_Modificacion = NOW() WHERE id_usuario = :id_usuario');
        $query->execute([
            'id_usuario' => $id_usuario
        ]);

        $query2 = $this->connect()->prepare('UPDATE usuario SET Apellido_paterno = :apellidoPaterno WHERE id_usuario = :id_usuario');
        $query2->execute([
            'apellidoPaterno' => $apellidoPaterno,
            'id_usuario' => $id_usuario
        ]);
    }
    public function updateNombre($Nombre, $id_usuario) {
        $query = $this->connect()->prepare('UPDATE usuario SET Fecha_Modificacion = NOW() WHERE id_usuario = :id_usuario');
        $query->execute([
            'id_usuario' => $id_usuario
        ]);

        $query2 = $this->connect()->prepare('UPDATE usuario SET Nombre = :Nombre WHERE id_usuario = :id_usuario');
        $query2->execute([
            'Nombre' => $Nombre,
            'id_usuario' => $id_usuario
        ]);
    }
    public function setFoto($id_usuario, $FotoNueva)
    {
        $query = $this->connect()->prepare('UPDATE usuario SET Fecha_Modificacion = NOW() WHERE id_usuario = :id_usuario');
        $query->execute([
            'id_usuario' => $id_usuario
        ]);

        $query2 = $this->connect()->prepare('UPDATE usuario SET Foto = :FotoNueva WHERE id_usuario = :id_usuario');
        $query2->execute([
            'id_usuario' => $id_usuario,
            'FotoNueva' => $FotoNueva
        ]);
    }


    public function setUser($id_usuario){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE id_usuario = :id_usuario');
        $query->execute(['id_usuario' => $id_usuario]);
        
        foreach ($query as $Usuario) {
            $this->id_usuario = $Usuario['id_usuario'];
            $this->nombre = $Usuario['Nombre'];
            $this->ApellidoP = $Usuario['Apellido_paterno'];
            $this->ApellidoM = $Usuario['Apellido_materno'];
            $this->Genero = $Usuario['Genero'];
            $this->Correo = $Usuario['Correo'];
            $this->Matricula = $Usuario['Matricula'];
            $this->Foto = $Usuario['Foto'];
            $this->Portada = $Usuario['Portada'];
            $this->id_rol = $Usuario['id_rol'];
            $this->telefono = $Usuario['Telefono'];
            $this->Fecha_creacion = $Usuario['Fecha_creacion'];
            $this->Fecha_modificacion = $Usuario['Fecha_modificacion'];
            $this->Activo = $Usuario['Activo'];
            $this->Fecha_nacimiento = $Usuario['Fecha_nacimiento'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidoPaterno() {
        return $this->ApellidoP;
    }
    
    public function getApellidoMaterno() {
        return $this->ApellidoM;
    }
    
    public function getGenero() {
        return $this->Genero;
    }
    
    public function getCorreo() {
        return $this->Correo;
    }
    
    public function getMatricula() {
        return $this->Matricula;
    }
    
    public function getFoto() {
        return $this->Foto;
    }
    
    public function getIdRol() {
        return $this->id_rol;
    }
    public function getPortada() {
        return $this->Portada;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function getFechaCreacion() {
        return $this->Fecha_creacion;
    }
    
    public function getFechaModificacion() {
        if ($this->Fecha_modificacion == "") {
            $this->Fecha_modificacion = "No se han hecho modificaciones.";
        }
        return $this->Fecha_modificacion;
    }
    
    public function getActivo() {
        if ($this->Activo == "1") {
            $this->Activo = "Activo";
        } else {
            $this->Activo = "Inactivo";
        }
        return $this->Activo;
    }
    
    public function getFechaNacimiento() {
        return $this->Fecha_nacimiento;
    }
    public function getTiempo($fecha)
    {
        $timestamp = strtotime($fecha);
        $now = time();
        $difference = $now - $timestamp;

        if ($difference >= 86400) { // Más de un día
            $days = floor($difference / 86400);
            return "$days día(s)";
        } elseif ($difference >= 3600) { // Más de una hora
            $hours = floor($difference / 3600);
            return "$hours hora(s)";
        } elseif ($difference >= 60) { // Más de un minuto
            $minutes = floor($difference / 60);
            return "$minutes minuto(s)";
        } else { // Menos de un minuto
            return "unos segundos";
        }
    }
    public function getIdUsuario() {
        return $this->id_usuario;
    }
}
$host = 'db5013309636.hosting-data.io';
$dbname = 'dbs11162154';
$user = 'dbu5692069';
$password = '7$a%WsD@%AMZiZ7YZ5N!hT';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

if (isset($_POST['searchText'])) {
    if (isset($_POST['searchText']) && $_POST['ClickG'] == null || $_POST['ClickG'] == "" ) {
        $searchText = $_POST['searchText'];
        $stmt = $pdo->prepare("
        SELECT * FROM grupo
        WHERE Nombre LIKE :searchText OR Clave LIKE :Clave
        LIMIT 6
        ");
        $stmt->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
        $stmt->bindValue(':Clave', "%$searchText%", PDO::PARAM_STR);
        $stmt->execute();
        
        $sugerencias = ''; // Variable para almacenar las sugerencias
        $a = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($a > 0) {
                echo "<div id='Sugerencia' style='visibility: visible' class='Sugerencia'>";
                $a = 0;
            }
            $sugerencias .= "<li onclick='grupillo(this)' value='".$row['id_grupo']."'>" . $row['Nombre'] . " " . $row['Clave'] . "</li>";
        }

        if (!empty($sugerencias)) {
            echo "<label id='LabelBa'><b>Grupos</b></label>";
            echo "<ul>" . $sugerencias . "</ul>";
            echo "</div>";
        } else {
        }
    }
    if (isset($_POST['ClickG'])) {
    $searchText = $_POST['ClickG'];


    $stmt = $pdo->prepare("SELECT m.id_materia, c.Nombre as Carrera, m.nombre AS nombre_materia, mg.id_grupo, g.Clave AS nombre_grupo
                  FROM materia_grupo mg
                  JOIN materia m ON mg.id_materia = m.id_materia
                  JOIN grupo g ON mg.id_grupo = g.id_grupo
                  JOIN carrera c ON g.id_carrera = c.id_carrera
                  WHERE mg.id_grupo = :idGrupo
                  GROUP BY m.id_materia, m.nombre, mg.id_grupo, g.Clave
                  ORDER BY `id_grupo` ASC");
    $stmt->bindValue(':idGrupo', $searchText, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        echo '<table border="1" style="border-collapse: collapse;">
                <tr>
                    <th colspan="2">' . $result[0]["Carrera"] . '</td>
                </tr>
                <tr>
                    <th colspan="2">' . $result[0]["nombre_grupo"] . '</td>
                </tr>
                <tr>
                    <th>ID Materia</th>
                    <th>Materia</th>
                </tr>';

        foreach ($result as $materia) {
            echo '<tr>
                    <td>' . $materia["id_materia"] . '</td>
                    <td style="text-align: left">' . $materia["nombre_materia"] . '</td>
                  </tr>';
        }

        echo '</table>';
            $Usuariose = new UsuariosGrupo();
            $Usuariose->getUsuarioGrupo($result[0]["id_grupo"]);

            if ($Usuariose->getTotal() >= 10) {
                $valorN = 10;
            } else {
                $valorN = $Usuariose->getTotal();
            }
            for ($i = 0; $i < $valorN; $i++) {
                $Usuarioss = new Usuario();
                $Usuarioss->setUser($Usuariose->getIdU($i));
                echo "<style>";
                echo ".User { margin: 20px;
                    text-align: left; }";
                    echo "</style>";
                    echo "<div class=\"NombreUP User\">";
                    if ($i>0) {
    
                    } else {
    
                        echo "<h3>Usuarios en grupo</h3>";
                    }
                echo "<a href=\"" . "/usuarios/" . $Usuarioss->getIdUsuario() . "\" onmouseover=\"\">";
                echo "<span style=\"position: relative; padding-top: 15px\">";
                echo '<img src="files/Users/images/' . $Usuarioss->getFoto() . '" width="50px" height="50px" style="margin-bottom: -4px ;border-radius: 3px">';
                echo $Usuarioss->getNombre() . " " . $Usuarioss->getApellidoPaterno();
                echo "</span> <br>";
                echo "<span>";
                echo $result[0]["nombre_grupo"];
                echo "</span>";
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";
            
            }



        } else {
            }








    }


?>