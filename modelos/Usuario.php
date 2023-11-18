<?php
    class Usuario {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function listar() {
            $sql = "SELECT * FROM Usuarios";
            $result = $this->conn->query($sql);

            if (!$result){
                throw new Exception('Error en la consulta ');
            }

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function obtenerPorId($id) {
            $sql = "SELECT * FROM Usuarios WHERE cedula = $id";
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
            $cedula = $datos['cedula'];
            $clave = $datos['clave'];
            $nombre = $datos['nombre'];
            $telefono = $datos['telefono'];
            $email = $datos['email'];
    
            $sql = "INSERT INTO Usuarios (cedula, clave, nombre, telefono, email) 
                    VALUES ('$cedula', '$clave', '$nombre', '$telefono', '$email')";

            $result = $this->conn->query($sql);

            if (!$result){
                throw new Exception('Error en la consulta');
            }

            return $result; 
        }
    
        public function editar($id, $datos) {
            $clave = $datos['clave'];
            $nombre = $datos['nombre'];
            $telefono = $datos['telefono'];
            $email = $datos['email'];

            $sql = "UPDATE Usuarios 
                    SET clave='$clave', nombre='$nombre', telefono='$telefono', email='$email'
                    WHERE cedula = $id";

            $result = $this->conn->query($sql);
            
            if (!$result){
                throw new Exception('Error en la consulta');
            }   

            return $result;
        }
    
        public function eliminar($id) {
            $sql = "DELETE FROM Usuarios WHERE cedula = $id";
            $result =  $this->conn->query($sql);
            
            if (!$result){
                throw new Exception('Error en la consulta');
            }

            return $this->conn->affected_rows > 0;
        }

}
