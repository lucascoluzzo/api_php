<?php

    namespace App\Models;

    use App\Models\Connect;

    class Usuario
    {
        private static $table = 'usuarios';

        public static function select(int $id) {
            
            $connect = new Connect;
            $connPdo = $connect->getConnection();
            
            $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nenhum usuário encontrado!");
            }
        }

        public static function selectAll() {

            $connect = new Connect;
            $connPdo = $connect->getConnection();

            $sql = 'SELECT * FROM '.self::$table;
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                throw new \Exception("Nenhum usuário encontrado!");
            }
        }

        public static function insert($data) {

            $connect = new Connect;
            $connPdo = $connect->getConnection();

            $sql = 'INSERT INTO '.self::$table.' (nome, cidade, estado) VALUES (:nome, :cidade, :estado)';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':nome', $data['nome']);
            $stmt->bindValue(':cidade', $data['cidade']);
            $stmt->bindValue(':estado', $data['estado']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Usuário(a) inserido com sucesso!';
            } else {
                throw new \Exception("Falha ao inserir usuário(a)!");
            }
        }

        public static function put($id, $data) {

            $connect = new Connect;
            $connPdo = $connect->getConnection();

            $sql = 'UPDATE '.self::$table.' SET nome = :nome, cidade = :cidade, estado = :estado WHERE id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindValue(':nome', $data['nome']);
            $stmt->bindValue(':cidade', $data['cidade']);
            $stmt->bindValue(':estado', $data['estado']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return 'Usuário(a) Atualizado com sucesso!';
            } else {
                throw new \Exception("Falha ao Atualizar usuário(a)!");
            }
        }

        public static function delete(int $id) {

            $connect = new Connect;
            $connPdo = $connect->getConnection();

            $sql = 'DELETE FROM '.self::$table.' WHERE id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return 'Usuário(a) Deletado com sucesso!';
            } else {
                throw new \Exception("Falha ao Deletar usuário(a)!");
            }
        }
    }