<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Tests\Infrastructure;

use OpenEMR\Modules\TelegramNotifier\Infrastructure\Container\OeModuleContainer;
use PHPUnit\Framework\TestCase;

class OeModuleContainerTest extends TestCase
{
    /** @test */
    public function can_return_a_telegram_notifier_service(): void
    {
        $container = new OeModuleContainer();

        $telegramNotifier = $container->get('telegram_notifier');

        self::assertIsString($telegramNotifier);
    }
}
