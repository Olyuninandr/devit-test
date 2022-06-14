<?php

namespace App\Models\DTO;

/**
 *
 */
class RssItemDTO
{
    /**
     * @var string
     */
    public string $title;
    /**
     * @var string
     */
    public string $link;
    /**
     * @var string
     */
    public string $description;
    /**
     * @var string
     */
    public string $pubDate;
    /**
     * @var string
     */
    public string $guid;
    /**
     * @var string
     */
    public string $creator;
    /**
     * @var object
     */
    public object $category;

    /**
     * @param object $item
     */
    public function __construct(object $item)
    {
        $creatorLabel = "dc:creator";

        $this->title = $item->title;
        $this->link = $item->link;
        $this->description = $item->description;
        $this->pubDate = $item->pubDate;
        $this->guid = $item->guid;
        $this->category = $item->category;
        $this->creator = $item->$creatorLabel;
    }
}
