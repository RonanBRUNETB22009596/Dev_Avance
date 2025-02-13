<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FlagController extends AbstractController
{
    #[Route('/api/flags', name: 'api_flags', methods: ['GET'])]
    public function getFlags(): JsonResponse
    {
        // Sample array of flags (replace with actual data)
        $flags = [
            ['name' => 'United States', 'flag' => '🇺🇸'],
            ['name' => 'Canada', 'flag' => '🇨🇦'],
            ['name' => 'France', 'flag' => '🇫🇷'],
            // Add more flags as needed
        ];

        return $this->json($flags); // Symfony will automatically return a JSON response
    }
}
