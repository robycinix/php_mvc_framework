<?php
namespace Core;

class Model {
    protected static string $table;
    public int $id;

    public function save() {
        return ORM::save($this);
    }

    public static function find(int $id) {
        return ORM::find(static::class, $id);
    }

    public static function all() {
        return ORM::all(static::class);
    }
}
