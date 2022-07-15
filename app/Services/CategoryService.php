<?php

namespace App\Services;


use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Void_;


class CategoryService
{
    /**
     * @Var $categoryRepository
     */
    protected CategoryRepository $categoryRepository;

    /**
     * CategoryRepository constructor
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): Collection
    {
        $categories = $this->categoryRepository->index();
        foreach ($categories as $category){
            $category->postCountAll = $this->categoryRepository->countPostsAll($category->id);
            $category->postCountPublic = $this->categoryRepository->countPostsPublic($category->id);
        }

        return $categories;
    }

    public function indexBlog(): Collection
    {
        $categories = $this->categoryRepository->index()->where('type', '=', 'blog');
        foreach ($categories as $category){
            $category->postCountAll = $this->categoryRepository->countPostsAll($category->id);
            $category->postCountPublic = $this->categoryRepository->countPostsPublic($category->id);

        }
        return $categories;

        //return $this->categoryRepository->index()->where('type', '=', 'blog');
    }

    public function indexPortfolio(): Collection
    {
        return $this->categoryRepository->index()->where('type', '=', 'portfolio');
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
    public function store(StoreCategoryRequest $request): Category
    {
        return $this->categoryRepository->store($request->validated());
    }
//
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->categoryRepository->update($request->validated(), $category);
    }
//
    public function destroy(Category $category)
    {
        try{
            if ($this->categoryRepository->countPostsAll($category->id) > 0) {
                throw new \Exception('W kategorii "'.$category->name.'" znajdują się wpisy! Nie można usunąć!');
            } else $this->categoryRepository->delete($category);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', 'Usunięto kategorię '.$category->name);
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
    public function changeStatus(Category $category)
    {
        $this->categoryRepository->changeStatus($category);
    }

}
