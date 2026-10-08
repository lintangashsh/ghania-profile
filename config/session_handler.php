<?php
declare(strict_types=1);

require_once __DIR__ . '/database.php';

class DatabaseSessionHandler implements SessionHandlerInterface {
    private Database $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function open(string $path, string $name): bool {
        return true;
    }

    public function close(): bool {
        return true;
    }

    public function read(string $id): string|false {
        $data = $this->db->table('sessions')->where('id', $id)->first();
        if ($data) {
            return (string) $data['data'];
        }
        return '';
    }

    public function write(string $id, string $data): bool {
        $access = time();
        $existing = $this->db->table('sessions')->where('id', $id)->first();
        
        if ($existing) {
            $this->db->table('sessions')->where('id', $id)->update([
                'access' => $access, 
                'data' => $data
            ]);
        } else {
            $this->db->table('sessions')->insert([
                'id' => $id, 
                'access' => $access, 
                'data' => $data
            ]);
        }
        return true;
    }

    public function destroy(string $id): bool {
        $this->db->execute("DELETE FROM sessions WHERE id = ?", [$id]);
        return true;
    }

    public function gc(int $max_lifetime): int|false {
        $old = time() - $max_lifetime;
        $stmt = $this->db->execute("DELETE FROM sessions WHERE access < ?", [$old]);
        return $stmt->rowCount();
    }
}

$handler = new DatabaseSessionHandler();
session_set_save_handler($handler, true);
