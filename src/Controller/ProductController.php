<?php
namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/products')]
class ProductController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(Request $request, ProductRepository $repo): JsonResponse
    {
        $category = $request->query->get('category');

        if ($category) {
            $products = $repo->findBy(['category' => $category]);
        } else {
            $products = $repo->findAll();
        }

        return $this->json($products, 200, [], ['groups' => 'product:read']);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(Product $product): JsonResponse
    {
        return $this->json($product, 200, [], ['groups' => 'product:read']);
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $product = new Product();

        $product->setName($data['name']);
        $product->setQuantity($data['quantity']);

        if (!empty($data['expirationDate'])) {
            $product->setExpirationDate(new \DateTime($data['expirationDate']));
        }

        if (!empty($data['restockDate'])) {
            $product->setRestockDate(new \DateTime($data['restockDate']));
        }

        if (!empty($data['supplier'])) {
            $product->setSupplier($data['supplier']);
        }

        if (!empty($data['category'])) {
            $product->setCategory($data['category']);
        }

        $em->persist($product);
        $em->flush();

        return $this->json($product, 201, [], ['groups' => 'product:read']);
    }

    #[Route('/{id}', methods: ['PATCH', 'PUT'])]
    public function update(Request $request, Product $product, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['name']))
            $product->setName($data['name']);
        if (isset($data['quantity']))
            $product->setQuantity($data['quantity']);

        if (!empty($data['expirationDate'])) {
            $product->setExpirationDate(new \DateTime($data['expirationDate']));
        }

        if (!empty($data['restockDate'])) {
            $product->setRestockDate(new \DateTime($data['restockDate']));
        }

        if (isset($data['supplier'])) {
            $product->setSupplier($data['supplier']);
        }
        if (isset($data['category'])) {
            $product->setCategory($data['category']);
        }

        $em->flush();

        return $this->json($product, 200, [], ['groups' => 'product:read']);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(Product $product, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($product);
        $em->flush();
        return $this->json(['message' => 'Product deleted successfully']);
    }
}
