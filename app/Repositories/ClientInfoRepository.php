<?php

namespace App\Repositories;

use Nette\Database\Connection;

class ClientInfoRepository
{
    private Connection $db;

    public function __construct(
        private Connection $database,
    ) {
        $this->db = $this->database;
    }

    public function createNewRecord(
        string $name,
        string $email,
        string $phone,
        int $age
    ): void
    {
        $this->db->query('INSERT INTO client_info ?', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'age' => $age,
    ]);
    }
}