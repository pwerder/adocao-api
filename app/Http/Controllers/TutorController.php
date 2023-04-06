<?php

namespace App\Http\Controllers;

use App\Http\Requests\TutorPostRequest;
use App\Models\Tutor;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{
    public function create(TutorPostRequest $request)
    {
        $tutor = new Tutor();

        $name = htmlspecialchars($request->name, ENT_QUOTES);
        $email = filter_var($request->email, FILTER_VALIDATE_EMAIL);
        $password = Hash::make($request->password);

        $tutor->name = $name;
        $tutor->email = $email;
        $tutor->password = $password;
        $tutor->save();

        return \response($request->all());
    }
}