<?php

namespace App\Repositories;

use Core\DataBase;

class ViewCounterRepository
{
    private DataBase $db;

    public function __construct()
    {
        $this->db = new DataBase();
        $this->db->connect();
    }

    /**
     * @param array $viewerData
     *
     * @return bool
     */
    public function increment(array $viewerData): bool
    {
        $query = <<<SQL
INSERT INTO `views_counter` (`ip_address`, `user_agent`, `page_url`, `views_count`)
VALUES(:ip_address, :user_agent, :page_url, 1)
ON DUPLICATE KEY UPDATE    
    `view_date` = CURRENT_TIMESTAMP(),
    `views_count` = `views_count` + 1;
SQL;
        $params = [
            ':ip_address' => $viewerData['ipAddress'],
            ':user_agent' => $viewerData['userAgent'],
            ':page_url' => $viewerData['pageUrl'],
        ];

        return $this->db->execute($query, $params);
    }
}