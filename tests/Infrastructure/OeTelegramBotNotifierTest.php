<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Tests\Infrastructure;

use OpenEMR\Modules\TelegramNotifier\Infrastructure\Notifier\OeTelegramBotNotifier;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Notifier\Message\ChatMessage;

class OeTelegramBotNotifierTest extends TestCase
{
    private const TOKEN = '111222333:AAGwmU2HALCHR613RLj3rXC2Fx0W8MLnR-8';
    private const CHAT_ID = 'xxxxxxxxxxxxxxxxxx';

    /** @test */
    public function can_be_created(): void
    {
        $telegramBotNotifier = new OeTelegramBotNotifier(self::TOKEN, self::CHAT_ID);

        self::assertInstanceOf(OeTelegramBotNotifier::class, $telegramBotNotifier);
    }

    /**
     * @test
     * @dataProvider  empty_credentials_provider
     */
    public function empty_credential_throw_exception(string $token, string $chatId): void
    {
        self::expectException(\InvalidArgumentException::class);

        new OeTelegramBotNotifier($token, $chatId);
    }

    public function empty_credentials_provider(): \Generator
    {
        yield 'All empty set' => ['',''];
        yield 'Token empty set' => ['',self::CHAT_ID];
        yield 'Chat id empty set' => [self::TOKEN, ''];
    }

    // TODO mock
    public function can_notify_a_message(): void
    {
        self::markTestSkipped('it works with valid credentials');
        $message = new ChatMessage('Test from PhpUnit.');
        $telegramBotNotifier = new OeTelegramBotNotifier('', '');

        $telegramBotNotifier->send($message);

        self::assertInstanceOf(OeTelegramBotNotifier::class, $telegramBotNotifier);
    }
}
