<?php

namespace App\Services;

use App\Models\Categories;

class CategoriesService
{
    /**
     * @var string
     */
    public string $name;
    /**
     * @var object
     */
    public object $categories;
    /**
     * @var array
     */
    public array $categoriesIds = [];

    /**
     * @param object $categories
     */
    public function __construct(object $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param string $name
     * @return int
     */
    public function save(string $name): int
    {
        $category = new Categories();
        $category->name = $name;
        $category->save();

        return $category->id;
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        foreach ($this->categories as $category) {
            $this->categoriesIds[] = $this->save($category);
        }

        return $this->categoriesIds;
    }
}
