<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Infrastructure\Notifier;

use Symfony\Component\Notifier\Message\ChatMessage;

class OeTelegramMessage
{
    /** @var ChatMessage */
    private $defaultTelegramMessage;

    /**
     * OeTelegramMessage constructor.
     * @param ChatMessage $defaultTelegramMessage
     */
    public function __construct(?ChatMessage $defaultTelegramMessage)
    {
        $this->defaultTelegramMessage = new ChatMessage('\'OpenEmr test message.\'');
    }
}
