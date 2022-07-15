<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CategoryService $categoryService
     * @return View
     */
    public function index(CategoryService $categoryService): View
    {
        return view('categories.index', [
            'categories' => $categoryService->index(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryService $categoryService
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryService $categoryService ,StoreCategoryRequest $request): RedirectResponse
    {
        $categoryService->store($request);
        return redirect(route('category.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryService $categoryService
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */

    public function update(CategoryService $categoryService, UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $categoryService->update($request, $category);
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryService $categoryService
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(CategoryService $categoryService, Category $category): RedirectResponse
    {
        $categoryService->destroy($category);
        return redirect(route('category.index'));
    }

    public function confirm(Category $category): View
    {
        return view('categories.confirm',[
            'category' => $category,
        ]);
    }

    public function changeStatus(CategoryService $categoryService, Category $category): RedirectResponse
    {
        $categoryService->changeStatus($category);
        return redirect(route('category.index'));
    }
}
