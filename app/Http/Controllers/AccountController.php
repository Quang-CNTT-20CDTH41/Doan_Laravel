<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->search()->paginate(6);
        return view('admin.account.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(User $account)
    {
        return view('admin.account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(User $account)
    {
        return view('admin.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $account)
    {
        if ($account->update($request->all())) {
            return redirect()->back()->with('status', 'Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('status', 'Xoá người dùng thành công');
    }

    // public function search(Request $request)
    // {
    //     $output = '';
    //     $users = User::where('email', 'like', '%' . $request->keyword . '%')->get();
    //     foreach ($users as  $user) {
    //         $status = ($user->status == 1) ? '<span class="badge bg-success">Public</span>' : '<span class="badge bg-danger">Private</span>';
    //         $output .= '<tr>
    //             <th>1</th>
    //             <td>' . $user->name . '</td>
    //             <td>' . $user->email . '</td>
    //             <td>' . $user->phone . '</td>
    //             <td>' . $status . ' </td>
    //             <td>
                     
    //             </td>
    //         </tr>';
    //     }
    //     return response()->json($output);
    // }
}
