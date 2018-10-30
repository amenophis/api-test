<?php

namespace App\User\Infrastructure\ApiPlatform\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\User\Domain\Model\User;
use App\User\UI\Api\UserCreateInput;
use App\User\UI\Api\UserCreateOutput;
use Ramsey\Uuid\Uuid;

class UserDataPersister implements DataPersisterInterface
{
    private $decorated;

    public function __construct(DataPersisterInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function supports($data): bool
    {
        return $data instanceof UserCreateInput;
    }

    /**
     * @param UserCreateInput $data
     * @return UserCreateOutput
     */
    public function persist($data)
    {
        $userId = Uuid::uuid4();

        $user = User::create($userId, $data->name);

        $this->decorated->persist($user);

        return UserCreateOutput::create($user->getId(), $user->getName());
    }

    public function remove($data)
    {
        $this->decorated->remove($data);
    }
}