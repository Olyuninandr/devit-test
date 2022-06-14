<?php

namespace App\Services;

use App\Models\DTO\RssItemDTO;
use App\Models\Posts;

/**
 *
 */
class PostsService
{
    /**
     * @var RssItemDTO
     */
    private RssItemDTO $data;

    /**
     * @var Posts|null
     */
    private ?Posts $post;

    /**
     * @var CategoriesService
     */
    private CategoriesService $categoriesService;

    /**
     * @param RssItemDTO $data
     */
    public function __construct(RssItemDTO $data)
    {
        $this->data = $data;
        $this->post = (new Posts())->getOneByTitle($this->data->title);
        $this->categoriesService = new CategoriesService($this->data->category);
    }

    /**
     * @return Posts
     */
    private function save(): Posts
    {
        $post = new Posts();
        $post->title = $this->data->title;
        $post->link = $this->data->link;
        $post->description = $this->data->description;
        $post->pubDate = $this->data->pubDate;
        $post->guid = $this->data->guid;
        $post->creator = $this->data->creator;
        $post->save();

        return $post;
    }

    /**
     * @return void
     */
    public function handle()
    {
        if (is_null($this->post)) {
            $post = $this->save();
            $categoriesIds = $this->categoriesService->handle();

            $post->categories()->attach($categoriesIds);
        }
    }
}
