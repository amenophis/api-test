<?php

namespace App\User\UI\Api;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 */
class UserCreateInput
{
    /**
     * @var string
     *
     * @ApiProperty(
     *     identifier=true,
     *     writable=false
     * )
     */
    public $id;

    /**
     * @var string
     *
     * @ApiProperty()
     *
     * @Assert\NotBlank()
     * @Assert\Length(min="5", max="255")
     */
    public $name;
}