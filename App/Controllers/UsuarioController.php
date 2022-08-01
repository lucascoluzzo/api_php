<?php
    namespace App\Controllers;

    use App\Models\Usuario;

    class UsuarioController
    {
        
        public function get($id = null) 
        {
            if ($id) {
                return Usuario::select($id);
            } else {
                return Usuario::selectAll();
            }
        }

        public function post() 
        {
            $data = $_POST;

            return Usuario::insert($data);
        }

        public function put($id = null) 
        {
            $_PUT = [];

            if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
                parse_str(file_get_contents('php://input'), $_PUT);
            }

            $data = $_PUT;

            return Usuario::put($id, $data);
        }

        public function delete($id = null) 
        {
            return Usuario::delete($id);
        }
    }