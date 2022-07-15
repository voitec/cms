<?php

namespace App\Repositories;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class CategoryRepository
{
    /**
     * @Var category
     */
    protected Category $category;

    /**
     * SectionRepository constructor
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(): Collection
    {
        return DB::table('categories')->orderBy('name')->get();
    }

    public function countPostsAll(int $id): int
    {
        return DB::table('posts')->where('category_id', '=',$id)->count();
    }

    public function countPostsPublic(int $id): int
    {
        return DB::table('posts')->where('category_id', '=',$id)->where('status', '=', 'public')->count();
    }

//    public function getAllSections(): Collection
//    {
//        return Section::all()->sortBy('position');
//    }
//
//    public function getAllPosts(): Collection
//    {
//        return Post::all();
//    }
//
//    public function getLast()
//    {
//        return Section::all()->max('position');
//    }
//
    public function store($data): Category
    {
        $category = new Category($data);
        $category->save();
        return $category->fresh();
    }
//
    public function update($request, Category $category): Category
    {
        $category->fill($request);
        $category->save();
        return $category->fresh();
    }
//
    public function delete(Category $category)
    {
       $category->delete();
    }
//
//    public function moveUp($section)
//    {
//        if($section->position==1) return redirect(route('home'));
//        else {
//            DB::table('sections')->where('position','=', $section->position-1)->update([
//                'position' => $section->position,
//            ]);
//            DB::table('sections')->where('id','=', $section->id)->update([
//                'position' => $section->position-1,
//            ]);
//        }
//    }
//
//    public function moveDown($section)
//    {
//        $count = DB::table('sections')->get()->count();
//        if($section->position==$count) return redirect(route('home'));
//        else {
//            DB::table('sections')->where('position','=', $section->position+1)->update([
//                'position' => $section->position,
//            ]);
//            DB::table('sections')->where('id','=', $section->id)->update([
//                'position' => $section->position+1,
//            ]);
//        }
//    }
//
    public function changeStatus(Category $category)
    {
        if($category->status=='public'){
            DB::table('categories')->where('id',$category->id)->update([
                'status' => 'private',
            ]);
        } else {
            DB::table('categories')->where('id',$category->id)->update([
                'status' => 'public',
            ]);
        }
    }



}
