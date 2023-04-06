<?php

namespace App\Http\Controllers;

use App\Http\Requests\TutorPostRequest;
use App\Http\Requests\TutorPutRequest;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{

    public function index()
    {
        return Tutor::all() ?? 'Não encontrado';
    }

    public function store(TutorPostRequest $request)
    {
        $tutor = new Tutor();

        $name = htmlspecialchars($request->name, ENT_QUOTES);
        $password = Hash::make($request->password);

        $tutor->name = $name;
        $tutor->email = $email;
        $tutor->password = $password;
        $tutor->save();

        return response($request->all());
    }

    public function show(int $id)
    {
        $user = Tutor::find($id);

        if ($user) {
            return response($user, 302);
        }
        return response('Não encontrado', 404);
    }

    public function update(TutorPutRequest $request, int $id)
    {
        Tutor::whereId($id)->update($request->all());
        return Tutor::find($id);
    }

    public function destroy(int $id)
    {
        return Tutor::destroy($id) ? 'Sucesso ao deletar usuário' : 'Falha ao deletar usuário';
    }
}
