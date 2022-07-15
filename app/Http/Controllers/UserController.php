<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Enums\UserRole;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UserService $userService
     * @return View
     */
    public function index(UserService $userService): View
    {
        return view('users.index', [
            'users' => $userService->index(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function passwordReset(): View
    {
        return view('users.passwordReset');
    }

    public function passwordStore(UserService $userService ,UpdateUserPasswordRequest $request): RedirectResponse
    {
        $userService->updatePassword($request);
        return redirect(route('user.passwordReset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserService $userService
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */

    public function store(UserService $userService ,StoreUserRequest $request): RedirectResponse
    {
        $userService->store($request);
        return redirect(route('user.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => UserRole::TYPES
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserService $userService
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */

    public function update(UserService $userService, UpdateUserRequest $request, User $user): RedirectResponse
    {
        $userService->update($request, $user);
        return redirect(route('user.index'));
    }

    public function changeStatus(UserService $userService, User $user): RedirectResponse
    {
        $userService->changeStatus($user);
        return redirect(route('user.index'));
    }
}
