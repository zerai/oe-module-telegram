<?php declare(strict_types=1);

if (!\defined('TEST_FILES_PATH')) {
    \define('TEST_FILES_PATH', __DIR__ . \DIRECTORY_SEPARATOR . '_files' . \DIRECTORY_SEPARATOR);
}

require_once __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv\Dotenv::create(__DIR__, '.env.test');
$dotenv->load();
