<?php
declare(strict_types=1);

namespace Zerai\ModulesIsolation\FileSystem;

use InvalidArgumentException;
use Zerai\ModulesIsolation\Contract\FileSystem;

class ModuleFilesystem implements FileSystem
{
    /** @var string */
    private $basePath;

    public function __construct(string $basePath='')
    {
        $this->assertBasePath($basePath);
        $this->basePath = $basePath;
    }

    private function assertBasePath(string $basePath): bool
    {
        if (empty($basePath) || strlen($basePath)<1) {
            throw new InvalidArgumentException('Invalid basepath :'.$basePath);
        }

        return true;
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }
}
