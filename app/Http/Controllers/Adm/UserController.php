<?php

namespace App\Http\Controllers\Adm;

use App\Classes\ImageHandler;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private $users;

    public function __construct(User $users) {
        $this->users = $users;
    }

    public function index()
    {
        $user = Auth::user();
        return view('admin.user.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->users->find($id);

        if($user->id != Auth::user()->id) {
            return redirect()->route('login.logout');
        }

        $image = $user->image;
        if($request->hasFile('image')) {
            $image = ImageHandler::saveImage($request->image, true, 'upload/users');
        }

        $user->update([
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'image' => $image,
        ]);
        return redirect()->back()->with(['success' => 'Dados atualizados com sucesso!']);
    }

}
