<?php

namespace App\Repositories;

use Nette\Database\Connection;
use Tracy\Debugger;

class AdministrationRepository
{
    private Connection $db;

    public function __construct(
        private Connection $database,
    ) {
        $this->db = $this->database;
    }

    public function getClientInfos(
        int $limit,
        int $offset
    ): array {
        return $this->db->fetchAll('SELECT * FROM client_info ORDER BY created_at DESC LIMIT ? OFFSET ?', $limit, $offset);
    }

    public function getClientInfosCount(): int
    {
        return $this->db->fetchField('SELECT COUNT(*) FROM client_info');
    }
}