<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUpdateUserRequest;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //Construct é usado em projetos de larga escala
     public function __construct(
        protected User $repository,
     ){

     }

    public function index()
    {
        $users = $this->repository->all();

        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated(); //Pega apenas os parametros passados no StoreUpdateUserRequest
        // $data = $request->all();
        $data['senha'] = bcrypt($request->senha);

        $user = $this->repository->create($data);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = $this->repository->where('id', '=', $id)->first();

        // if (!user){
        //     return response()->json(['message' => 'user not found'], 404);
        // }

        $user = $this->repository->findOrFail($id);

        return new UserResource($user);
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
    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $user = $this->repository->findOrFail($id);

        $data = $request->all();

        if ($request->senha) //se colocar senha ela é criptografada
            $data['senha'] = bcrypt($request->senha);

        $user->update($data);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->repository->findOrFail($id)->delete();
        //$user->delete(); se tirar o delete da linha de cima pode colocar aqui que dá na mesma

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
