<?php

namespace App\Http\Controllers;
use App\Pokemon;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin',User::class);
        $types=Type::all();
        return view('admin.type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin',User::class);

        return view('admin.type.add');
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
            'type'=>'required|string|unique:types',
            'color'=>["required","regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/"]
        ]);
        $this->authorize('admin',User::class);

        $type=new Type();
        $type->type=$request->type;
        $type->color=$request->color;
        $type->save();
        return redirect()->route('type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $type=Type::find($id);
        $pokemons=Pokemon::where('id_type',$id)->paginate(10);
        return view('showType',compact('type','pokemons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin',User::class);

        $type=Type::find($id);
        return view('admin.type.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('admin',User::class);

        $request->validate([
            'type'=>'required|string|unique:types,type,'.$id,
            'color'=>["required","regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/"]
        ]);
        $type=Type::find($id);
        $type->type=$request->type;
        $type->color=$request->color;
        $type->save();
        return redirect()->route('type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin',User::class);

        $type=Type::find($id);
   
        foreach ($type->pokemons as $item) {
            if($item->id_user!=null){
                $item->user->id_role=2;
                $item->user->save();
            }
            $item->delete();
        }
        $type->delete();
        return redirect()->back();
    }

}