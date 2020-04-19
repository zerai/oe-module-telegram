<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Infrastructure\Notifier;

use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;
use Symfony\Component\Notifier\Message\MessageInterface;
use Symfony\Component\Notifier\Transport;
use Symfony\Component\Notifier\Transport\TransportInterface;

class OeTelegramBotNotifier
{
    /** @var TransportInterface */
    private $telegramTransport;

    /** @var LoggerInterface */
    private $logger;

    /**
     * OeTelegramBotNotifier constructor.
     * @param string $token
     * @param string $chatId
     * @param LoggerInterface $logger
     */
    public function __construct(string $token, string $chatId, ?LoggerInterface $logger = null)
    {
        $this->telegramTransport = $this->withCredentials($token, $chatId);
        $this->logger = $logger ?? new NullLogger();
    }


    /**
     * @param MessageInterface $message
     * @throws TransportExceptionInterface
     */
    public function send(MessageInterface $message): void
    {
        try {
            $this->telegramTransport->send($message);
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage());
            throw $exception;
        }
    }


    /**
     * @param string $token
     * @param string $chatId
     */
    public function withCredentials(string $token, string $chatId): void
    {
        if (empty($token)) {
            throw new InvalidArgumentException('Empty telegram token.');
        }

        if (empty($chatId)) {
            throw new InvalidArgumentException('Empty telegram chat_id.');
        }

        $this->telegramTransport = Transport::fromDsn('telegram://'.$token.'@default?channel='.$chatId);
    }
}
