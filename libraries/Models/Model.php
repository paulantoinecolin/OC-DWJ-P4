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

    // Return One Item by it's ID
    public function find(int $id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }

    // This is ADMIN ONLY
    public function delete(int $id): void
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    // Return Article list ordered by Creation Date
    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }

        // We use query only (no need to prepare because no variable involved)
        $results = $this->db->query($sql);
        // We fetch all results to extract all data
        $articles = $results->fetchAll();

        return $articles;
    }
}
