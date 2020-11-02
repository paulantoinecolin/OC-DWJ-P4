<?php

namespace Models;

abstract class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = \Database::dbConnect();
    }

    // !! find() -> read()
    // Return One Item by it's ID
    public function find(int $id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }

    // This is gonna be ADMIN ONLY
    public function delete(int $id): void
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    // !! findAllArticles() -> readAll()
    // !! $articles -> $items
    // Return Article list ordered by Creation Date
    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }

        // On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
        $results = $this->db->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $results->fetchAll();

        return $articles;
    }
}
