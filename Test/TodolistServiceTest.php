<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\TodoList;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;

function testShowTodolist(): void
{
    $todoListRepository = new TodolistRepositoryImpl();
    $todoListRepository->todolist[1] = new TodoList("Belajar PHP OOP");
    $todoListRepository->todolist[2] = new TodoList("Belajar PHP WEB");
    $todoListRepository->todolist[3] = new TodoList("Belajar PHP Database");

    $todoListService = new TodolistServiceImpl($todoListRepository);

    $todoListService->showTodolist();
}

function testAddTodolist(): void
{
    $todoListRepository = new TodolistRepositoryImpl();

    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListService->addTodolist("Belajar PHP");
    $todoListService->addTodolist("Belajar PHP OOP");
    $todoListService->addTodolist("Belajar PHP WEB");

    $todoListService->showTodolist();
}

function testRemoveTodolist(): void
{
    $todoListRepository = new TodolistRepositoryImpl();

    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListService->addTodolist("Belajar PHP");
    $todoListService->addTodolist("Belajar PHP OOP");
    $todoListService->addTodolist("Belajar PHP WEB");

    $todoListService->showTodolist();

    // Test Remove
    $todoListService->removeTodolist(2);
    $todoListService->showTodolist();

    $todoListService->removeTodolist(4);
    $todoListService->showTodolist();

    $todoListService->removeTodolist(1);
    $todoListService->showTodolist();
}

testRemoveTodolist();