<?php
    class Docente {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function listar() {
            $sql = "SELECT * FROM Docentes";
            $result = $this->conn->query($sql);

            if (!$result){
                throw new Exception('Error en la consulta ');
            }

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function obtenerPorId($id) {
            $sql = "SELECT * FROM Docentes WHERE id = $id";
            $result = $this->conn->query($sql);

            if (!$result){
                throw new Exception('Error en la consulta');
            }

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                throw new Exception('Usuario no encontrado');
            }
        }
    
        public function agregar($datos) {
            $usuario_id = $datos['usuario_id'];
            $nombre = $datos['nombre'];
            $apellidos = $datos['apellidos'];
            $email = $datos['email'];
            $telefono = $datos['telefono'];
            $blog  = $datos['blog'];
            $profesional = $datos['profesional'];
            $escalaron = $datos['escalaron'];
            $idioma = $datos['idioma'];
            $añosExperiencia = $datos['aosExperiencia'];
            $areaTrabajo = $datos['areaTrabajo'];
    
            $sql = "INSERT INTO Docentes (usuario_id, nombre, apellidos, email, telefono, blog, profesional, escalaron, idioma, aosExperiencia, areaTrabajo) 
                    VALUES ('$usuario_id', '$nombre', '$apellidos', '$email', '$telefono', '$blog', '$profesional', '$escalaron', '$idioma', '$añosExperiencia', '$areaTrabajo')";
    
            $result = $this->conn->query($sql);

            if (!$result){
                throw new Exception('Error en la consulta');
            }

            return $result; 

        }
    
        public function editar($id, $datos) {
            $usuario_id = $datos['usuario_id'];
            $nombre = $datos['nombre'];
            $apellidos = $datos['apellidos'];
            $email = $datos['email'];
            $telefono = $datos['telefono'];
            $blog  = $datos['blog'];
            $profesional = $datos['profesional'];
            $escalaron = $datos['escalaron'];
            $idioma = $datos['idioma'];
            $añosExperiencia = $datos['aosExperiencia'];
            $areaTrabajo = $datos['areaTrabajo'];

            $sql = "UPDATE Docentes 
                    SET usuario_id='$usuario_id', nombre='$nombre', apellidos='$apellidos', email='$email', telefono='$telefono', blog='$blog', profesional='$profesional', escalaron='$escalaron', idioma='$idioma', aosExperiencia='$añosExperiencia',  areaTrabajo='$areaTrabajo'  
                    WHERE id = $id";

            $result = $this->conn->query($sql);

            if (!$result){
                throw new Exception('Error en la consulta');
            }   

            return $result;
        }
    
        public function eliminar($id) {
            $sql = "DELETE FROM Docentes WHERE id = $id";
            $result = $this->conn->query($sql);

            if (!$result){
                throw new Exception('Error en la consulta');
            }

            return $this->conn->affected_rows > 0;
        }

}
