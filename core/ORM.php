<?php
namespace Core;

class ORM {
    protected static Database $db;

    public static function init(Database $db) {
        static::$db = $db;
    }

    public static function save(Model $model) {
        $props = get_object_vars($model);
        $table = $model::$table;
        if (isset($model->id)) {
            // update
            $sets = [];
            $params = [];
            foreach ($props as $key => $value) {
                if ($key === 'id') continue;
                $sets[] = "$key = :$key";
                $params[":$key"] = $value;
            }
            $params[':id'] = $model->id;
            $sql = "UPDATE $table SET " . implode(', ', $sets) . " WHERE id = :id";
            $stmt = static::$db->pdo->prepare($sql);
            $stmt->execute($params);
        } else {
            // insert
            $fields = array_keys($props);
            $placeholders = array_map(fn($f) => ':' . $f, $fields);
            $sql = "INSERT INTO $table (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
            $stmt = static::$db->pdo->prepare($sql);
            $params = array_combine($placeholders, array_values($props));
            $stmt->execute($params);
            $model->id = static::$db->pdo->lastInsertId();
        }
        return $model;
    }

    public static function find(string $class, int $id) {
        $table = $class::$table;
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = static::$db->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetch() ?: null;
    }

    public static function all(string $class) {
        $table = $class::$table;
        $sql = "SELECT * FROM $table";
        $stmt = static::$db->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
}
