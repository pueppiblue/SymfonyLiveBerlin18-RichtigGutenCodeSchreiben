<?php
declare(strict_types=1);


namespace example\Value;


final class Container
{
    /** @var ContainerId */
    private $id;
    /** @var Port */
    private $targetPort;

    private function __construct(ContainerId $id, Port $targetPort)
    {
        $this->id = $id;
        $this->targetPort = $targetPort;
    }

    public static function fromContainerIdAndPort(ContainerId $id, Port $targetPort): self
    {
        return new self($id, $targetPort);
    }

    public function id(): ContainerId
    {
        return $this->id;
    }

    public function targetPort(): Port
    {
        return $this->targetPort;
    }
}
