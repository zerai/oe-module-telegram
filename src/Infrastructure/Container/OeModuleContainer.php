<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Infrastructure\Container;

use Zerai\ModulesIsolation\Container\OeModuleContainer as BaseContainer;

class OeModuleContainer extends BaseContainer
{
    public function telegram_notifier_service(): string
    {
        return 'telegram_notifier';
    }
}
