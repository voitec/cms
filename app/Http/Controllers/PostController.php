<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PostService $postService
     * @param Category $category
     * @return View
     */
    public function index(PostService $postService, Category $category): View
    {
        return view('posts.index', [
            'posts' => $postService->indexPosts($category)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param PostService $postService
     * @return View
     */
    public function indexAll(PostService $postService): View
    {
        return view('posts.index', [
            'posts' => $postService->indexPostsAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostService $postService
     * @param \App\Http\Requests\StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(PostService $postService, StorePostRequest $request): RedirectResponse
    {
        $post = $postService->store($request);
        return redirect(route('post.show', $post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param PostService $postService
     * @param Post $post
     * @return View
     */
    public function show(PostService $postService, Post $post): View
    {
        return view('posts.show', [
            'post' => $postService->show($post)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostService $postService
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostService $postService, UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $postService->update($request, $post);
        return redirect(route('post.show', $post->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PostService $postService
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(PostService $postService, Post $post): RedirectResponse
    {
        $postService->destroy($post);
        return redirect(route('post.indexAll'));
    }

    public function confirm(Post $post): View
    {
        return view('posts.confirm',[
            'post' => $post,
        ]);
    }
}
