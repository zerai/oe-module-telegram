<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Infrastructure\Ui;

class FooController
{
    public function __invoke(): string
    {
        return "<h1>Hello foo!!</h1>";
    }
}
