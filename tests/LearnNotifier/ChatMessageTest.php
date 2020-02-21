<?php
declare(strict_types=1);

namespace OpenEMR\Modules\TelegramNotifier\Tests\LearnNotifier;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\Recipient;

class ChatMessageTest extends TestCase
{
    private const IRRELEVANT_MESSAGE = 'irrelevant message...';

    /** @test */
    public function can_be_created(): void
    {
        $message = new ChatMessage(self::IRRELEVANT_MESSAGE);

        self::assertInstanceOf(ChatMessage::class, $message);
        self::assertEquals(self::IRRELEVANT_MESSAGE, $message->getSubject());
        self::assertNull($message->getOptions());
    }

    /** @test */
    public function can_be_created_from_factory_method(): void
    {
        $notification = new Notification(self::IRRELEVANT_MESSAGE);
        $recipient = new Recipient('joe.doe@example.com');
        $transport = null;

        $message = ChatMessage::fromNotification($notification, $recipient, $transport);

        self::assertInstanceOf(ChatMessage::class, $message);
        self::assertEquals(self::IRRELEVANT_MESSAGE, $message->getSubject());
        self::assertNull($message->getOptions());
        self::assertNull($message->getTransport());
        self::assertNotNull($message->getNotification());
        self::assertEquals(self::IRRELEVANT_MESSAGE, $message->getNotification()->getSubject());
    }

    /** @test */
    public function can_be_created_from_factory_method_with_transport(): void
    {
        $channel = 'fooChannel';
        $telegramTransportString = sprintf('telegram://%s?channel=%s', 'testHost', $channel);

        $notification = new Notification(self::IRRELEVANT_MESSAGE);
        $recipient = new Recipient('joe.doe@example.com');


        $message = ChatMessage::fromNotification($notification, $recipient, $telegramTransportString);

        self::assertInstanceOf(ChatMessage::class, $message);
        self::assertEquals(self::IRRELEVANT_MESSAGE, $message->getSubject());
        self::assertNull($message->getOptions());
        self::assertNull($message->getTransport());
        self::assertNotNull($message->getNotification());
        self::assertEquals(self::IRRELEVANT_MESSAGE, $message->getNotification()->getSubject());
    }


    /** @test */
    public function can_change_the_message(): void
    {
        $message = new ChatMessage(self::IRRELEVANT_MESSAGE);

        $message->subject('hi..!! '.self::IRRELEVANT_MESSAGE);

        self::assertEquals('hi..!! '.self::IRRELEVANT_MESSAGE, $message->getSubject());
    }
}
