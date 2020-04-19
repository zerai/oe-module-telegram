<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Tests\LearnNotifier;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Notifier\Bridge\Telegram\TelegramTransport;
use Symfony\Component\Notifier\Chatter;
use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Notifier\Notifier;
use Symfony\Component\Notifier\Transport;

class NotifierServiceTest extends TestCase
{
    /** @test */
    public function can_create_a_minimal_notifier_service(): void
    {
        $telegramTransport = new TelegramTransport('my_token');
        $notifierService = new Notifier([new Chatter($telegramTransport)]);

        self::assertInstanceOf(Notifier::class, $notifierService);
    }

    /** @test */
    public function can_create_a_minimal_chatter_notifier_service(): void
    {
        $telegramTransport = new TelegramTransport('my_token');
        $chatterNotifierService = new Chatter($telegramTransport);

        self::assertInstanceOf(Chatter::class, $chatterNotifierService);
        self::assertInstanceOf(ChatterInterface::class, $chatterNotifierService);
    }

//    /** @test */
//    public function it_works(): void
//    {
//        $chatMessage = new ChatMessage('Hello world!!');
//        //'null://null'
//        //'telegram://{TOKEN}@default?channel={CHAT_ID}';
//        $telegram = Transport::fromDsn('null://null');
//
//        $telegram->send($chatMessage);
//        //TODO underscore cause error 'Bad Request: can't parse entities: Can't find end of the entity starting at byte offset 5 (400).'
//        //$chatMessage = new ChatMessage('Hello_world!!');
//        //$telegram->send($chatMessage);
//    }
}
