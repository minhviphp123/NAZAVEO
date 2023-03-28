<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

function checkDupName($array, $name)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]->name == $name) {
            return true;
        }
    }

    return false;
}

class UserController extends Controller
{



    public function index()
    {
        $users = DB::table('devs')->get();

        return view('home', compact('users'));
    }

    public function goToAddUser()
    {
        $errorMess = '';
        return view('formAddUser', compact('errorMess'));
    }

    public function goToUpdateUser($id)
    {

        $editedUser = DB::table('devs')->where('id', $id)->get();

        return view('formUpdateUser', compact('editedUser'));
    }

    public function addNewUser(Request $request)
    {

        $errorMess = '';

        $name = $request->input('name');
        $password = $request->input('password');

        if (!checkDupName(DB::table('devs')->get(), $name)) {
            DB::table('devs')->insert([
                'name' => $name,
                'password' => $password
            ]);

            return redirect('/');
        } else {

            $errorMess = 'this name was used!';

            return view('formAddUser', compact('errorMess'));
        }
    }

    public function editUser(Request $request, $id)
    {
        // $user = DB::table('devs')->where('id', $id)->get()[0];
        // $user->name = $request->input('name');
        // $user->password = $request->input('password');
        // $user->update();
        // return redirect('/');

        $affected = DB::table('devs')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'password' => $request->input('password')
            ]);

        return redirect('/');
    }

    public function deleteUser($userId)
    {
        $deteled = DB::table('devs')->where('id', $userId)->delete();

        return redirect('/');
    }
}
