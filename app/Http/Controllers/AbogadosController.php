<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

/*

controller para los perfiles de todos los usuarios

*/

class AbogadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("welcome");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['abogados']= 
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data['abogados'] = DB::table('users')->where('rol', 2)->get();                    
        // $data['abogados'] = DB::select("SELECT * FROM users WHERE rol = 2");

        //return response()->json($data['abogados']);


        // return view('abogados.lista');
         return $data['abogados'];
    }
    // public function show()
    // {
    //     //

    //     $data['abogados'] = DB::select("SELECT * FROM users WHERE rol = 2");

    //     //return response()->json($data['abogados']);
        

    //     // return view('abogados.lista');
    //      return $data['abogados'];
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile($id){
        $user = User::find($id);

        return view('abogados.profile',[
            'user'=>$user
        ]);
   }

    public function lista($search = null){ //$search = null

     // $user = User::where('rol' = '2' and  'name', 'LIKE', '%'.$search.'%')
         if (!empty($search)){
               $data = DB::table('users')->where('rol', 2)
                                         ->where('name', 'LIKE', '%'.$search.'%')
                                         ->orwhere('specialty', 'LIKE', '%'.$search.'%')
                                         ->orwhere('surname', 'LIKE', '%'.$search.'%');
      //   $data['abogados'] = DB::select("SELECT * FROM users WHERE rol = 2");
         }else{
             $data = DB::table('users')->where('rol', 2);  

        }
        $data = $data->get(); 
    return view('abogados.lista', ['data' => $data]);
   //  return view('abogados.lista');
}


}

