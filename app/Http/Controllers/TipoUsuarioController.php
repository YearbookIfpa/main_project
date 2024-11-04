<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = UserType::all();
        return view("admin.tipo_usuario.index", compact("tipos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users_type,name,except,id|string'
            // Adicione mais campos conforme necessário
        ]);
        $uppercaseName = strtoupper($request['name']);
        
        if(UserType::create(
            ['name' => $uppercaseName]
        )){
            return redirect()->route('tipo_usuario.index')->with('success', 'Tipo Usuário Cadastrado com Sucesso');
        }else{
            return redirect()->route('tipo_usuario.index')->with('error', 'Erro no cadastro de tipo usuário');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $userType  = UserType::findOrFail($id);
        return response()->json($userType );
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
        $request->validate([
            'name' => 'required|string'
            // Adicione mais campos conforme necessário
        ]);
        $uppercaseName = strtoupper($request['name']);

        $userType = UserType::findOrFail($id);
        $userType->update(
            [
                'name' => $uppercaseName
            ]
        );

        return response()->json(['success' => 'Tipo de usuário atualizado com sucesso']);;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userType = UserType::find($id);
        
        
        if($userType->delete()){
            return response()->json(['success' => 'Tipo de usuário removido com sucesso!']);
        }else{
            return response()->json(['error' => $id]);
        }
    }
    public function delete($id)
    {
        $userType = UserType::find($id);
        if($userType->delete()){
            return response()->json(['success' => 'Tipo de usuário removido com sucesso!']);
        }else{
            return response()->json(['error' => 'Erro na remoção!']);
        }
    }
}
