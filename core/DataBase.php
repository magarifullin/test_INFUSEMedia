<?php

declare(strict_types=1);

namespace Core;

use PDO;
use PDOException;
use Psr\Log\LoggerInterface;

class DataBase
{
    private PDO $dbh;
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface|null $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger ?? new Logger();
    }

    /**
     * @return void
     */
    public function connect(): void
    {
        try {
            $this->dbh = new PDO(
                sprintf(
                    '%s:host=%s;port=%d;dbname=%s',
                    $_ENV['DB_DRIVER'],
                    $_ENV['DB_HOST'],
                    $_ENV['DB_PORT'],
                    $_ENV['DB_DATABASE']
                ),
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
        }
    }

    /**
     * @param string $query
     * @param array $bindings
     *
     * @return bool
     */
    public function execute(string $query, array $bindings = []): bool
    {
        try {
            return $this->dbh->prepare($query)->execute($bindings);
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
        }

        return false;
    }
}