<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SupplyRequestController extends AbstractController
{
    #[Route('/api/supply-request', name: 'app_api_supply_request')]
    public function index(): Response
    {
        $dummyData = [
            ['id' => 1, 'name' => 'Nutrition'],
            ['id' => 2, 'name' => 'Sport'],
            ['id' => 3, 'name' => 'Beaute'],
            ['id' => 4, 'name' => 'Hygiene'],
            ['id' => 5, 'name' => 'Decoration']

        ];

        return $this->json($dummyData);
    }
}
