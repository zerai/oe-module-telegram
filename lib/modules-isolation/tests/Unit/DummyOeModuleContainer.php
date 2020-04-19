<?php
declare(strict_types=1);

namespace Zerai\ModulesIsolation\Test\Unit;

use Zerai\ModulesIsolation\Container\OeModuleContainer as BaseContainer;

class DummyOeModuleContainer extends BaseContainer
{
    public function foo_notifier_service(): string
    {
        return 'foo_notifier';
    }
}
