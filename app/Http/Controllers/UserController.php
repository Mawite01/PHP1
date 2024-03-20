<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $userService;

    private $roleRepository;

    public function __construct(UserService $userService, RoleRepositoryInterface $roleRepository)
    {
        $this->userService = $userService;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        if (!Gate::allows('user_list')) {
            return abort(401);
        }

        $users = $this->userService->index();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }

        $roles = $this->roleRepository->all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }

        $this->userService->store($request->validated());

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
