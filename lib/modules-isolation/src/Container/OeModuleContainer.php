<?php
declare(strict_types=1);

namespace Zerai\ModulesIsolation\Container;

use Zerai\ModulesIsolation\Contract\OeModuleContainer as OeModuleContainerPort;

class OeModuleContainer implements OeModuleContainerPort
{
    private const SERVICE_SUFFIX = '_service';

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws OeModuleContainerNotFoundException  No entry was found for **this** identifier.
     * @throws OeModuleContainerException Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        if (empty($id) || !is_string($id)) {
            throw new OeModuleContainerException('You should specify a valid service id for the requested service.');
        }
        if (!$this->has($this->requestedService($id))) {
            throw new OeModuleContainerNotFoundException(sprintf('Service %s doesn\'t exist', $id));
        }

        try {
            $method = $this->requestedService($id);
            return $this->$method();
        } catch (\Exception $exception) {
            throw new OeModuleContainerException();
        }
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id): bool
    {
        return method_exists($this, $id);
    }

    private function requestedService(string $id): string
    {
        return $id . self::SERVICE_SUFFIX;
    }
}
