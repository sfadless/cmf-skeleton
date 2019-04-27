<?php

namespace Sfadless\Cmf\Security;

use Sfadless\Cmf\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * UserProvider
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class UserProvider implements UserProviderInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function loadUserByUsername($email): User
    {
        $user = $this->findOneUserBy(['username' => $email]);

        if (!$user) {
            throw new UsernameNotFoundException(
                sprintf(
                    'User with "%s" email does not exist.',
                    $email
                )
            );
        }

        return $user;
    }

    private function findOneUserBy(array $options): ?User
    {
        return $this->entityManager
            ->getRepository(User::class)
            ->findOneBy($options);
    }

    public function refreshUser(UserInterface $user): User
    {
        assert($user instanceof User);

        if (null === $reloadedUser = $this->findOneUserBy(['id' => $user->getId()])) {
            throw new UsernameNotFoundException(sprintf(
                'User with ID "%s" could not be reloaded.',
                $user->getId()
            ));
        }

        return $reloadedUser;
    }

    public function supportsClass($class): bool
    {
        return $class === User::class;
    }
}