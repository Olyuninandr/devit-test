<?php

namespace App\Console\Commands;

use App\Models\DTO\RssItemDTO;
use App\Models\Posts;
use App\Services\PostsService;
use Feed;
use FeedException;
use Illuminate\Console\Command;

class LifehakerRss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:pull:lifehaker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * @var string|array|false
     */
    protected string $url;

    /**
     * @var Posts
     */
    protected Posts $post;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->url = getenv('LIFEHACKER_RSS_URL');
        $this->post = new Posts();
    }

    /**
     * Execute the console command.
     *
     * @throws FeedException
     */
    public function handle()
    {
        $rss = Feed::loadRss($this->url);

        foreach ($rss->item as $item) {
            $postService = new PostsService(
                new RssItemDTO($item)
            );
            $postService->handle();
        }
    }
}
