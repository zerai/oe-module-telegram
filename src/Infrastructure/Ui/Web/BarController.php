<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Infrastructure\Ui;

class BarController
{
    public function __invoke(): string
    {
        return "<h1>Hello bar!!</h1>";
    }
}
