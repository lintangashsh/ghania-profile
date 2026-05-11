<?php
declare(strict_types=1);

define('BASE_URL', '/ghania-profile/');

class Database {
    private static ?Database $instance = null;
    private \PDO $pdo;
    
    private string $table = '';
    private string $select = '*';
    private array $where = [];
    private array $bindings = [];
    private string $orderBy = '';
    private string $limit = '';
    private string $offset = '';
    private array $joins = [];

    private function __construct() {
        $host = "127.0.0.1";
        $user = "root";
        $pass = "";
        $db   = "ghania_profile";
        $charset = "utf8mb4";

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            die("Koneksi Database Gagal: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): \PDO {
        return $this->pdo;
    }

    public function execute(string $sql, array $params = []): \PDOStatement {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    private function reset(): void {
        $this->table = '';
        $this->select = '*';
        $this->where = [];
        $this->bindings = [];
        $this->orderBy = '';
        $this->limit = '';
        $this->offset = '';
        $this->joins = [];
    }

    public function table(string $table): self {
        $this->reset();
        $this->table = $table;
        return $this;
    }

    public function select(string $select): self {
        $this->select = $select;
        return $this;
    }

    public function join(string $table, string $first, string $operator, string $second, string $type = 'LEFT'): self {
        $this->joins[] = "$type JOIN $table ON $first $operator $second";
        return $this;
    }

    public function where(string $column, $operator = null, $value = null): self {
        if ($value === null) {
            $value = $operator;
            $operator = '=';
        }
        $this->where[] = "$column $operator ?";
        $this->bindings[] = $value;
        return $this;
    }

    public function whereRaw(string $sql, array $bindings = []): self {
        $this->where[] = $sql;
        $this->bindings = array_merge($this->bindings, $bindings);
        return $this;
    }

    public function orderBy(string $column, string $direction = 'ASC'): self {
        $this->orderBy = "ORDER BY $column $direction";
        return $this;
    }

    public function limit(int $limit): self {
        $this->limit = "LIMIT $limit";
        return $this;
    }

    public function offset(int $offset): self {
        $this->offset = "OFFSET $offset";
        return $this;
    }

    private function buildSelectQuery(): string {
        $sql = "SELECT {$this->select} FROM {$this->table}";
        if (!empty($this->joins)) {
            $sql .= " " . implode(" ", $this->joins);
        }
        if (!empty($this->where)) {
            $sql .= " WHERE " . implode(" AND ", $this->where);
        }
        if (!empty($this->orderBy)) {
            $sql .= " {$this->orderBy}";
        }
        if (!empty($this->limit)) {
            $sql .= " {$this->limit}";
        }
        if (!empty($this->offset)) {
            $sql .= " {$this->offset}";
        }
        return $sql;
    }

    public function get(): array {
        $sql = $this->buildSelectQuery();
        $stmt = $this->execute($sql, $this->bindings);
        return $stmt->fetchAll();
    }

    public function first(): ?array {
        $this->limit(1);
        $sql = $this->buildSelectQuery();
        $stmt = $this->execute($sql, $this->bindings);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function value(string $column) {
        $result = $this->first();
        return $result ? $result[$column] : null;
    }

    public function count(): int {
        $originalSelect = $this->select;
        $this->select = "COUNT(*) as count";
        $this->orderBy = '';
        $this->limit = '';
        $this->offset = '';
        $sql = $this->buildSelectQuery();
        $stmt = $this->execute($sql, $this->bindings);
        $result = $stmt->fetch();
        $this->select = $originalSelect;
        return (int)($result['count'] ?? 0);
    }

    public function insert(array $data): bool {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = $this->execute($sql, array_values($data));
        return $stmt->rowCount() > 0;
    }

    public function update(array $data): bool {
        $setParts = [];
        $values = [];
        foreach ($data as $column => $value) {
            $setParts[] = "$column = ?";
            $values[] = $value;
        }
        $setString = implode(', ', $setParts);
        $sql = "UPDATE {$this->table} SET $setString";
        if (!empty($this->where)) {
            $sql .= " WHERE " . implode(" AND ", $this->where);
            $values = array_merge($values, $this->bindings);
        }
        $stmt = $this->execute($sql, $values);
        return true;
    }
}

$db = Database::getInstance();