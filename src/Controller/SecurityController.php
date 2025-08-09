<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Doctrine\ORM\EntityManagerInterface;

class SecurityController extends AbstractController
{
    #[Route('/api/login_check', name: 'api_login_check', methods: ['POST'])]
    public function login(#[CurrentUser] ?User $user): Response
    {
        // This route is protected by the json_login authenticator in security.yaml
        // The auth success handler will handle the token generation and response
        
        // This method will not be executed if authentication fails
        if (!$user) {
            return new JsonResponse(['message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }
        
        // The Lexik JWT Authentication Bundle's handler will create the response
        // so we don't need to do anything here
        return $this->json(['message' => 'Authentication successful']);
    }
    
    #[Route('/api/token/update', name: 'api_token_update', methods: ['POST'])]
    public function updateToken(Request $request, TokenStorageInterface $tokenStorage, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_UNAUTHORIZED);
        }
        
        $token = $request->headers->get('Authorization');
        if ($token) {
            // Remove 'Bearer ' prefix if present
            $token = str_replace('Bearer ', '', $token);
            
            // Update the user with the new token
            $user->setTokenJwt($token);
            $user->setLastConnection(new \DateTime());
            
            $em->persist($user);
            $em->flush();
            
            return new JsonResponse(['message' => 'Token updated successfully']);
        }
        
        return new JsonResponse(['message' => 'No token provided'], Response::HTTP_BAD_REQUEST);
    }
}
