<?php
    require_once __DIR__ . '/../conexion.php';
    require_once __DIR__ . '/../modelos/Usuario.php';

    class UsuarioController {
        private $usuarioModel;

        public function __construct($conn) {
            $this->usuarioModel = new Usuario($conn);
        }

        public function listar() {
            try {
                return $this->usuarioModel->listar();
            } catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public function obtenerPorId($id) {
            try {
                return $this->usuarioModel->obtenerPorId($id);
            } catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        public function agregar($datos) {
            try {
                return $this->usuarioModel->agregar($datos);
            } catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public function editar($id, $datos) {
            try {
                return $this->usuarioModel->editar($id, $datos);
            } catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public function eliminar($id) {
            try {
                return $this->usuarioModel->eliminar($id);
            } catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }
    }

    $usuarioController = new UsuarioController($conn);
?>