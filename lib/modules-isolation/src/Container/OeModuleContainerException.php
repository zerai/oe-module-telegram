<?php
declare(strict_types=1);

namespace Zerai\ModulesIsolation\Container;

use Psr\Container\ContainerExceptionInterface;

final class OeModuleContainerException extends \RuntimeException implements ContainerExceptionInterface
{
    public function __construct(string $message = '', int $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
