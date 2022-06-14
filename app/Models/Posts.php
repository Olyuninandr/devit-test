<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'description',
        'pubDate',
        'guid',
        'creator',
    ];

    /**
     * @param $data
     * @return $this
     * @throws \Throwable
     */
    public function addNew($data): Posts
    {
        $this->fill($data);
        $this->saveOrFail();

        return $this;
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class);
    }

    /**
     * @param string $title
     * @return Posts|null
     */
    public function getOneByTitle(string $title): ?Posts
    {
        return Posts::where('title', $title, 'like')->first() ?? null;
    }
}
