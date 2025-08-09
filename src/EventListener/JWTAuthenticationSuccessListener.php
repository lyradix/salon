<?php

namespace App\EventListener;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class JWTAuthenticationSuccessListener
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event): void
    {
        $data = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof UserInterface) {
            return;
        }

        // Make sure we're working with our User entity
        if (!$user instanceof User) {
            return;
        }

        // Set the JWT token in the user entity
        if (isset($data['token'])) {
            $user->setTokenJwt($data['token']);
            $user->setLastConnection(new \DateTime());
            
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }
    }
}
