<?php
// src/Controller/TaskController.php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/tasks', name: 'tasks_')]
class TaskController extends AbstractController
{
    #[Route('/', name: 'list', methods: ['GET'])]
    public function index(EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $tasks = $em->getRepository(Task::class)->findAll();
        $json = $serializer->serialize($tasks, 'json', ['groups' => 'task:read']);
        return new JsonResponse($json, 200, [], true);
    }

    #[Route('/', name: 'create', methods: ['POST'])]
    public function create(
        Request $request,
        EntityManagerInterface $em,
        ValidatorInterface $validator
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);
        
        $task = new Task();
        $task->setTitle($data['title'] ?? '');
        $task->setDescription($data['description'] ?? '');
        $task->setCreatedAt(new \DateTimeImmutable());

        $errors = $validator->validate($task);
        if (count($errors) > 0) {
            return $this->json($errors, 400);
        }

        $em->persist($task);
        $em->flush();

        return $this->json($task, 201, [], ['groups' => 'task:read']);
    
    }

    #[Route('/{id}', name: 'update', methods: ['PUT'])]
    public function update(
        Task $task,
        Request $request,
        EntityManagerInterface $em,
        ValidatorInterface $validator
    ): JsonResponse {
        if (!$task) {
            return $this->json(['error' => 'Task not found'], 404);
        }
        $data = json_decode($request->getContent(), true);

        $task->setTitle($data['title'] ?? $task->getTitle());
        $task->setDescription($data['description'] ?? $task->getDescription());
        $task->setCompleted($data['completed'] ?? $task->isCompleted());

        $errors = $validator->validate($task);
        if (count($errors) > 0) {
            return $this->json($errors, 400);
        }

        $em->flush();

        return $this->json($task);
    }

    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(Task $task, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($task);
        $em->flush();
        return $this->json(null, 204);
    }
}