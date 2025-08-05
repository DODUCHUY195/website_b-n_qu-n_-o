<?php
require_once __DIR__ . '/../config/database.php';

class Product {
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($name, $price, $desc) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $price, $desc]);
    }

    public static function update($id, $name, $price, $desc) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?");
        return $stmt->execute([$name, $price, $desc, $id]);
    }

    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
