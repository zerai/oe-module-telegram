<?php
declare(strict_types=1);

namespace Zerai\ModulesIsolation\Container;

use Psr\Container\NotFoundExceptionInterface;

final class OeModuleContainerNotFoundException extends \RuntimeException implements NotFoundExceptionInterface
{
    public function __construct(string $message = '', int $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
