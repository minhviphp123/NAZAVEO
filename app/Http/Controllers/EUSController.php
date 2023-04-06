<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;

class EUSController extends Controller
{

    public $data = [];
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }

    public function index()
    {
        return view('home');
    }

    public function products()
    {
        $this->data['content'] = 'Products';

        return view('client.products', $this->data);
    }

    public function getAdd()
    {

        $this->data['title'] = 'Thêm sản phẩm';

        return view('client.add', $this->data);
    }

    public function postAdd(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        //     'price' => 'required|numeric',
        // ]);

        $rules = [
            'name' => 'required|max:225',
            'price' => 'required|numeric',
        ];

        $messages = [
            'name.required' => 'Name bắt buộc phải nhập',
            'name.max:225' => 'Name ko dc vượt quá 225 kí tự',
            'price.required' => 'Price bắt buộc phải nhập',
            'price.numeric' => 'Price phải là numeric'
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return 'validate fail!';
        } else {
            return 'validate thành công';
        }
    }

    public function getUsers()
    {
        $title = 'Danh sách người dùng';
        $users = new Users();
        $usersList = $users->getAllUsers();
        // return $usersList;
        return view('client.users.lists', compact('title', 'usersList'));
    }

    public function getAddUsers()
    {
        $title = 'Thêm người dùng';

        return view('client.users.addUser', compact('title'));
        // return 1;
    }

    public function postAddUsers(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'password' => 'required|min:3'
            ],
            [
                'name.required' => 'bat buoc phai nhap',
                'password.required' => 'bat buoc phai nhap'
            ]
        );

        $dataInsert = [
            'name' => $request->name,
            'password' => $request->password
        ];

        // $users = new Users();

        // dd($dataInsert);

        $this->users->addUser($dataInsert);

        return redirect()->route('users.index');
        // with('msg', "Add thành công")
    }

    public function getEditUsers($id = 0)
    {
        $title = 'Cập nhật User';

        if (!empty($id)) { //lay du lieu theo id
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $userDetail = $userDetail[0];
            }
        } else { //redirect ve home
            return redirect()->route('users.index');
        }
        return view('client.users.editUser', compact('title', 'id', 'userDetail'));
    }

    public function postEditUsers(Request $request, $id = 0)
    {
        $request->validate(
            [
                'name' => 'required|min:2',
            ],
            [
                'name.required' => 'bat buoc phai nhap',
            ]
        );


        $dataUser = [
            'name' => $request->name,
        ];

        // dd($dataUser['name']);

        $this->users->updateUser($dataUser, $id);
        return redirect()->route('users.index')->with('success', 'Update thành công!');;
    }

    public function deleteUser($id = 0)
    {
        $this->users->deleteUser($id);

        return redirect()->route('users.index')->with('success', 'Delete thành công!');;
    }
}
