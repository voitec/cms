<?php

namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostService
{
    /**
     * @Var $sectionRepository
     */
    protected PostRepository $postRepository;

    /**
     * SectionRepository constructor
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function indexPosts(Category $category): Collection
    {
        return $this->postRepository->getAllPosts()->where('category_id', '=', $category->id);
        //return $this->postRepository->getAllPostsBlog();
    }

    public function indexPostsAll(): Collection
    {
        return $this->postRepository->getAllPosts();
        //return $this->postRepository->getAllPostsBlog();
    }

    public function show(Post $post): Post
    {
        return $this->postRepository->show($post);
        //return $this->postRepository->getAllPostsBlog();
    }

//    public function indexSections(): Collection
//    {
//        return $this->sectionRepository->getAllSections();
//    }
//
//    public function last()
//    {
//        return $this->sectionRepository->getLast();
//    }
//
    public function store(StorePostRequest $request)
    {
        try {
            $post = new Post();
            $post->fill($request->validated());
            if ($request->hasFile('image')) {
                $post->image = $request->file('image')->store('posts');
            }
            $post->save();
        } catch(\Error $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', 'Utworzono post ' . $post->name);
        return $post->fresh();
    }
//
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $oldImagePath = $post->image;
            $post->fill($request->validated());
            if ($request->hasFile('image') && !is_null($oldImagePath)) {
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }
            if ($request->hasFile('image')) {
                $post->image = $request->file('image')->store('posts');
            }
            $post->save();
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', 'Zaktualizowano post '.$post->name);
        return $post->fresh();
    }
//
    public function destroy(Post $post)
    {
        try {
            if(!is_null($post->image)) {
                Storage::delete($post->image);
            }
            $this->postRepository->delete($post);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', 'Usunięto post '.$post->name);
    }
//
//    public function up($section)
//    {
//        $this->sectionRepository->moveUp($section);
//    }
//
//    public function down($section)
//    {
//        $this->sectionRepository->moveDown($section);
//    }
//
//    public function changeStatus($section)
//    {
//        $this->sectionRepository->changeStatus($section);
//    }

}
