<?php

use App\Controller\Admin\PostController as AdminPostController;
use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\PostController;
use App\Core\Router;

Router::get("admin/post/new", [AdminPostController::class, 'new'], [AuthController::class, 'protect']);
Router::get("admin/posts", [AdminPostController::class, 'index'], [AuthController::class, 'protect']);
Router::get("admin/post/edit/{id}", [AdminPostController::class, 'edit'], [AuthController::class, 'protect']);
Router::post("admin/post/new", [AdminPostController::class, 'create'], [AuthController::class, 'protect']);
Router::patch("admin/post/edit/{id}", [AdminPostController::class, 'save'], [AuthController::class, 'protect']);
Router::delete("admin/post/delete/{id}", [AdminPostController::class, 'delete'], [AuthController::class, 'protect']);

Router::post("/", [AuthController::class, 'login']);
Router::get("login", [AuthController::class, 'index']);
Router::get("logout", [AuthController::class, 'logout']);

Router::get("post/{id_post}", [PostController::class, 'index']);
Router::get("/", [HomeController::class, 'index']);

Router::error();