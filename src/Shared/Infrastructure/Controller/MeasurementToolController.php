<?php
declare(strict_types=1);


namespace App\Shared\Infrastructure\Controller;

use App\MeasurementTools\Domain\Entity\MeasurementTool;
use App\MeasurementTools\Domain\Repository\MeasurementToolRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeasurementToolController extends AbstractController
{
    private MeasurementToolRepositoryInterface $repository;

    public function __construct(MeasurementToolRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    #[Route('/measurement-tool/add', name: 'add', methods: ['GET'])]
    public function add(): Response
    {
        $this->repository->add(new MeasurementTool('Caliper'));
        return new JsonResponse(['status' => 'ok']);
    }

    #[Route('/measurement-tool/remove', name: 'remove', methods: ['GET'])]
    public function remove(): Response
    {
        $this->repository->remove(1);
        return new JsonResponse(['status' => 'ok']);
    }
}