<?php

require_once __DIR__ . '/../config/database.php';

class CategoryModel
{
    public function all()
    {
        $sql = "SELECT * FROM categories ORDER BY id";

        return db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stm = db()->prepare("SELECT * FROM categories WHERE id=?");

        $stm->execute([$id]);

        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $description)
    {
        $stm = db()->prepare(
            "INSERT INTO categories(name,description)
             VALUES(?,?)"
        );

        $stm->execute([$name,$description]);

        return db()->lastInsertId();
    }

    public function update($id,$name,$description)
    {
        $stm = db()->prepare(
            "UPDATE categories
             SET name=?,description=?
             WHERE id=?"
        );

        return $stm->execute([$name,$description,$id]);
    }

    public function delete($id)
    {
        $stm = db()->prepare(
            "DELETE FROM categories
             WHERE id=?"
        );

        return $stm->execute([$id]);
    }
}