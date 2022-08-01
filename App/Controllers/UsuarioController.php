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

        public function put($id) 
        {
            return Usuario::select($id);
        }

        public function delete() 
        {
            
        }
    }