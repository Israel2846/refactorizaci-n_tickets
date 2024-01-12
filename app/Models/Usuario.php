<?php

namespace App\Models;

class Usuario extends Model
{
    protected $table = 'tm_usuario';

    public function createUser($data)
    {
        $values = array_values($data);

        $sql = "CALL create_user(" . str_repeat('?, ', count($values) - 1) . "?)";

        $this->query($sql, $values);
    }
}
