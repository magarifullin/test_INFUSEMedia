<?php

declare(strict_types=1);

use App\Controllers\BannerController;
use App\Repositories\RandomImageRepository;
use App\Repositories\ViewCounterRepository;
use Core\Request;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$controller = new BannerController(
    new ViewCounterRepository(),
    new RandomImageRepository()
);

$response = $controller->download(new Request());
$response->send();
