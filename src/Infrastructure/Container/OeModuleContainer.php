<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Infrastructure\Container;

use OpenEMR\Modules\TelegramNotifier\Infrastructure\Notifier\OeTelegramBotNotifier;
use Zerai\ModulesIsolation\Container\OeModuleContainer as BaseContainer;

class OeModuleContainer extends BaseContainer
{
    public function telegram_bot_notifier_service(): OeTelegramBotNotifier
    {
        // TODO remove hardcoded credentials
        $token = '941311607:AAGwmU2HALCHR613RLj3rXC2Fx0W8MLnR-8';
        $chatId = '203909508';
        return new OeTelegramBotNotifier($token, $chatId);
    }
}
