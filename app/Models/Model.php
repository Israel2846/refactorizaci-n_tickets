<?php

namespace App\Models;

use mysqli;

class Model
{
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;
    protected $connection;
    protected $query;
    protected $table;
    protected $orderBy = '';
    protected $where;
    protected $values = [];
    protected $select = '*';
    protected $join = '';

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if ($this->connection->connect_error) {
            die('Error de conexión' . $this->connection->connect_error);
        }
    }

    public function query($sql, $data = [], $params = null)
    {
        if ($data) {

            if ($params == null) {
                $params = str_repeat('s', count($data));
            }

            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param($params, ...$data);
            $stmt->execute();

            $this->query = $stmt->get_result();
        } else {
            $this->query = $this->connection->query($sql);
        }

        return $this;
    }

    public function select(...$columns)
    {
        $this->select = implode(', ', $columns);

        return $this;
    }

    public function join($tabla1, $union1, $tabla2, $union2, $as = null)
    {
        if ($as) {
            $this->join .= " INNER JOIN {$tabla2} AS {$as} ON {$tabla1}.{$union1} = {$as}.{$union2}";
        } else {
            $this->join .= " INNER JOIN {$tabla2} ON {$tabla1}.{$union1} = {$tabla2}.{$union2}";
        }

        return $this;
    }

    public function where($column, $operator, $value = null)
    {
        // SELECT * FROM tabla WHERE $column = $value

        if ($value == null) {
            $value = $operator;
            $operator = '=';
        }

        if ($this->where) {
            $this->where .= " AND {$column} {$operator} ?";
        } else {
            $this->where = "{$column} {$operator} ?";
        }

        $this->values[] = $value;

        return $this;
    }

    function orderBy($column, $order = "ASC")
    {
        if ($this->orderBy) {
            $this->orderBy .= ", {$column} {$order}";
        } else {
            $this->orderBy = "{$column} {$order}";
        }

        return $this;
    }

    public function first()
    {
        if (empty($this->query)) {

            $sql = "SELECT {$this->select} FROM {$this->table}";

            if ($this->where) {
                $sql .= " WHERE {$this->where}";
            }

            if ($this->orderBy) {
                $sql .= " ORDER BY {$this->orderBy}";
            }

            $this->query($sql, $this->values);
        }

        return $this->query->fetch_assoc();
    }

    public function get()
    {
        if (empty($this->query)) {

            $sql = "SELECT {$this->select} FROM {$this->table}";

            if ($this->where) {
                $sql .= " WHERE {$this->where}";
            }

            if ($this->orderBy) {
                $sql .= " ORDER BY {$this->orderBy}";
            }

            if ($this->join) {
                $sql .= "{$this->join}";
            }

            $this->query($sql, $this->values);
        }

        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    function paginate($cant = 15)
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        if (empty($this->query)) {

            $sql = "SELECT SQL_CALC_FOUND_ROWS {$this->select} FROM {$this->table}";

            if ($this->where) {
                $sql .= " WHERE {$this->where}";
            }

            if ($this->orderBy) {
                $sql .= " ORDER BY {$this->orderBy}";
            }

            $sql .= " LIMIT " . ($page - 1) * $cant . ", {$cant}";

            $data = $this->query($sql, $this->values)->get();
        }

        $total = $this->query("SELECT FOUND_ROWS() as total")->first()['total'];

        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');

        if (strpos($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        $last_page = ceil($total / $cant);

        return [
            "total" => $total,
            "from" => ($page - 1) * $cant + 1,
            "to" => ($page - 1) * $cant + count($data),
            "current_page" => $page,
            "last_page" => $last_page,
            "next_page_url" => $page < $last_page ? '/' . $uri . '?page=' . $page + 1 : null,
            "prev_page_url" => $page > 1 ? '/' . $uri . '?page=' . $page - 1 : null,
            "data" => $data,
        ];
    }

    // CONSULTAS
    public function all()
    {
        // SELECT * FROM tabla

        $sql = "SELECT * FROM {$this->table}";

        return $this->query($sql)->get();
    }

    public function find($id)
    {
        // SELECT * FROM tabla WHERE id = *

        $sql = "SELECT * FROM {$this->table} WHERE id = ?";

        return $this->query($sql, [$id], 'i')->first();
    }

    public function create($data)
    {
        // INSERT INTO tabla (column1, column2, ...) values ('', '', ...)

        $columns = array_keys($data);
        $columns = implode(', ', $columns);

        $values = array_values($data);

        foreach ($values as &$value) {
            $value = strtoupper($value);
        }

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (" . str_repeat('?, ', count($values) - 1) . "?)";

        $this->query($sql, $values);

        $insert_id = $this->connection->insert_id;

        return $this->find($insert_id);
    }

    public function update($id, $data)
    {
        // UPDATE tabla SET column1 = '', column2 = '', ... WHERE id = $id

        $fields = [];

        foreach ($data as $key => $value) {
            $fields[] = "{$key} = ?";
        }

        $fields = implode(', ', $fields);

        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = ?";

        $values = array_values($data);
        $values[] = $id;

        $this->query($sql, $values);

        return $this->find($id);
    }

    public function delete($id)
    {
        // DELETE FROM tabla WHERE id = $id

        $sql = "DELETE FROM {$this->table} WHERE id = ?";

        $this->query($sql, [$id], 'i');
    }
}
