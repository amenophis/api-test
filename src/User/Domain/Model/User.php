<?php

namespace App\User\Domain\Model;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use App\User\UI\Api\UserCreateInput;
use App\User\UI\Api\UserCreateOutput;

/**
 * @ApiResource(
 *     inputClass=UserCreateInput::class,
 *     outputClass=UserCreateOutput::class,
 * )
 * @ORM\Entity()
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id()
     * @ORM\Column(type="uuid")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public static function create(UuidInterface $id, string $name): self
    {
        return new User($id, $name);
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

    public function getName(): ?string
    {
        return $this->name;
    }
}
