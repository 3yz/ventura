<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = ['id', 'name', 'email', 'created_at', 'updated_at'];

        if(\Illuminate\Support\Facades\Request::ajax()) {

            //search MUST BE DEVELOPED
            $query = DB::table('users')
              ->skip(\Input::get('start'))
              ->take(\Input::get('length'));

            if ($order = \Input::get('order'))
            {
                $query->orderBy($columns[$order[0]['column']], $order[0]['dir']);
            }

            $users = $query->get();

            $total = \DB::table('users')->count();

            $response = [];
            $response['draw'] = \Input::get('draw');
            $response['recordsTotal'] = $total;
            $response['recordsFiltered'] = $total;
            $response['data'] = [];
            foreach($users as $user) {
              $response['data'][] = [
                $user->id,
                $user->name,
                $user->email,
                $user->created_at,
                $user->updated_at,
                '<a href="'.route('admin.users.show', $user->id).'" title="Visualizar" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> visualizar</a>
                 <a href="'.route('admin.users.edit', $user->id).'" title="Editar" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> editar</a>
                 <a href="'.route('admin.users.destroy', $user->id).'" title="Remover" class="btn btn-danger btn-xs btn-delete" data-token="'.csrf_token().'"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> remover</a>'
              ];
            }

            return response()->json($response);
        } else {
            // $users = \App\User::all();
            return view('admin.users.index', ['cols' => $columns]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $values = $request->all();
        $values['password'] = \Hash::make($values['password']);
        \App\User::create($values);

        \Session::flash('success', 'Usuário adicionado com sucesso!');

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::findOrFail($id);
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrFail($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::findOrFail($id);

        $validation = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ];
        if($request->get('password') != '') {
            $validation['password'] = 'required|min:8';
            $validation['confirm_password'] = 'required|same:password';

        }
        $this->validate($request, $validation);

        $values = $request->all();
        if($request->get('password') != '') {
          $values['password'] = \Hash::make($values['password']);
        }

        $user->fill($values)->save();

        \Session::flash('success', 'Usuário alterado com sucesso!');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = \App\User::findOrFail($id);

        $obj->delete();

        if(!\Illuminate\Support\Facades\Request::ajax()) {
            Session::flash('info', 'Registro removido!');

            return redirect()->route('admin.users.index');
        } else {
            return response()->json(['success' => true]);
        }
    }
}
