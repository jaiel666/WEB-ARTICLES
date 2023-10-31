<?php

namespace App\Controllers;

use App\Models\Article;
use App\Response;
use Carbon\Carbon;

class ArticleController
{
    public function index(): Response
    {
        return new Response('Article List', [
            'articles' => [
                new Article('Title 1', 'Description 1', Carbon::create(2020, 12, 10, 20, 0)),
                new Article('Title 2', 'Description 2', Carbon::create(2021, 1, 15, 14, 30)),
                new Article('Title 3', 'Description 3', Carbon::create(2022, 3, 5, 8, 45)),
                new Article('Title 4', 'Description 4', Carbon::create(2023, 10, 30, 16, 30)),
                new Article('Title 5', 'Description 5', Carbon::create(2023, 10, 30, 16, 45)),
                new Article('Title 6', 'Description 6', Carbon::create(2023, 10, 30, 17, 0)),
                new Article('Title 7', 'Description 7', Carbon::create(2023, 10, 30, 17, 15)),
                new Article('Title 8', 'Description 8', Carbon::create(2023, 10, 30, 17, 30)),
            ]
        ]);
    }

    public function show(): Response
    {
        return new Response('Article Show 1', [
            'article' => new Article('Title 1', 'New Description 1', Carbon::create(2020, 12, 10, 20, 0))
        ]);
    }

    public function show2(): Response
    {
        return new Response('Article Show 2', [
            'article' => new Article('Title 2', 'New Description 2', Carbon::create(2021, 1, 15, 14, 30))
        ]);
    }

    public function show3(): Response
    {
        return new Response('Article Show 3', [
            'article' => new Article('Title 3', 'New Description 3', Carbon::create(2022, 3, 5, 8, 45))
        ]);
    }
    public function show4(): Response
    {
        return new Response('Article Show 4', [
            'article' => new Article('Title 4', 'New Description 4', Carbon::create(2023, 10, 30, 16, 30))
        ]);
    }

    public function show5(): Response
    {
        return new Response('Article Show 5', [
            'article' => new Article('Title 5', 'New Description 5', Carbon::create(2023, 10, 30, 16, 45))
        ]);
    }

    public function show6(): Response
    {
        return new Response('Article Show 6', [
            'article' => new Article('Title 6', 'New Description 6', Carbon::create(2023, 10, 30, 17, 0))
        ]);
    }

    public function show7(): Response
    {
        return new Response('Article Show 7', [
            'article' => new Article('Title 7', 'New Description 7', Carbon::create(2023, 10, 30, 17, 15))
        ]);
    }

    public function show8(): Response
    {
        return new Response('Article Show 8', [
            'article' => new Article('Title 8', 'New Description 8', Carbon::create(2023, 10, 30, 17, 30))
        ]);
    }

}


