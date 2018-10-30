<?php

namespace App\User\UI\Api;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Ramsey\Uuid\UuidInterface;

/**
 * @ApiResource()
 */
class UserCreateOutput
{
    /**
     * @var UuidInterface
     *
     * @ApiProperty(
     *     identifier=true,
     *     iri="/users"
     * )
     */
    private $id;

    /**
     * @var string
     *
     * @ApiProperty()
     */
    private $name;

    /**
     * @var string
     *
     * @ApiProperty()
     */
    private $test = 'toto';

    public static function create(UuidInterface $id, string $name)
    {
        return new self($id, $name);
    }

    private function __construct(UuidInterface $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTest(): string
    {
        return $this->test;
    }
}