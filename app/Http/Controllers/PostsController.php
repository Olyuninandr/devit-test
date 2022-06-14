<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Posts;
use Illuminate\Contracts\Pagination\Paginator;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Paginator
     */
    public function index()
    {
        return Posts::with('categories')->simplePaginate(15);

    }

    /**
     * @param CreatePostRequest $request
     * @return Posts
     * @throws \Throwable
     */
    public function create(CreatePostRequest $request): Posts
    {
        return (new Posts())->addNew($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param Posts $post
     * @return Posts|null
     */
    public function show(Posts $post): ?Posts
    {
        return Posts::with('categories')->find($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditPostRequest $request
     * @param Posts $post
     * @return Posts
     */
    public function update(EditPostRequest $request, Posts $post)
    {
        $post->update($request->validated());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Posts $post
     * @return bool
     */
    public function destroy(Posts $post)
    {
        return $post->delete();
    }
}
