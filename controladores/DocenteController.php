<?php
    require_once __DIR__ . '/../conexion.php';
    require_once __DIR__ . '/../modelos/Docente.php';

    class DocenteController {
        private $docenteModel;

        public function __construct($conn) {
            $this->docenteModel = new Docente($conn);
        }

        public function listar() {
            try {
                return $this->docenteModel->listar();
            } catch (Exception $e){
                throw new Exception($e->getMessage()); 
            }
             
        }

        public function obtenerPorId($id) {
            try {
                return $this->docenteModel->obtenerPorId($id);
            } catch (Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }
        
        public function agregar($datos) {
            try {
                return $this->docenteModel->agregar($datos);
            } catch (Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }

        public function editar($id, $datos) {
            try {
                return $this->docenteModel->editar($id, $datos);
            } catch (Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }

        public function eliminar($id) {
            try {
                return $this->docenteModel->eliminar($id);
            } catch (Exception $e){
                throw new Exception($e->getMessage()); 
            }
        }
    }

    $docenteController = new DocenteController($conn);
?>