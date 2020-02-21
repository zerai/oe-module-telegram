<?php
declare(strict_types=1);

namespace Zerai\ModulesIsolation\Unit;

use PHPUnit\Framework\TestCase;
use Zerai\ModulesIsolation\Contract\FileSystem;
use Zerai\ModulesIsolation\FileSystem\ModuleFilesystem;

class ModuleFileSystemTest extends TestCase
{
    /** @test */
    public function can_be_created(): void
    {
        $fileSystem = new ModuleFilesystem('/home/');

        self::assertInstanceOf(FileSystem::class, $fileSystem);
        self::assertInstanceOf(ModuleFilesystem::class, $fileSystem);
        self::assertEquals('/home/', $fileSystem->getBasePath());
    }

    /** @test */
    public function cant_be_created_without_baseath(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new ModuleFilesystem();
    }
}
