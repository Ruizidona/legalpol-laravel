<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\evento;

class EventosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("evento.index");

    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formulario(Request $request)
    {
        $datosEvento_noval=request()->except(['_token', '_method']);

        //pasar la id de usuario que realizo la consulta
        $datosEvento_noval['id_usuario'] = auth()->user()->id;

        /*
        $datosEvento = $datosEvento_noval->validate([
        'title'       => 'required|unique:posts|max:255',
        'descripcion' => 'required|unique:posts|max:255',
        'id_usuario'  => 'required|digits:11',
        'id_abogado'  => 'required|digits:11',
        'color'       => 'optional',
        'textcolor'   => 'optional',
        'start'       => 'required|date|after|now',
        ]);
        */

        /*

        $validator = Validator::make($datosEvento_noval,[
        'title'       => 'required|unique:posts|max:255',
        'descripcion' => 'required|unique:posts|max:255',
        'id_usuario'  => 'required|digits:11',
        'id_abogado'  => 'required|digits:11',
        'color'       => 'optional',
        'textcolor'   => 'optional',
        'start'       => 'required|date|after|now'
        ]
        );

        if($validator->fails())
        {
            return redirect()->route('eventos.get')->withErrors($validator)->withInput();
        }
        */

        // $rules = [
        //     'title'       => ['required'],
        //     'descripcion' => ['required'],
        //     'id_usuario'  => ['required'],
        //     'id_abogado'  => ['required'],
        //     'color'       => ['optional'],
        //     'textcolor'   => ['optional'],
        //     'start'       => ['required'],
        // ];

        // $request->validate($rules);

        $datosEvento = $datosEvento_noval; //sin validar 

        //insertar en la base de datos el nuevo evento
        evento::insert($datosEvento);
        
  
        //consultas sql para obtener el nombre del cliente y el mail del abogado
        $id_cliente = $datosEvento['id_usuario'];
        $cliente      = DB::select("SELECT name, surname, id FROM users WHERE id = $id_cliente"); //???DASfasdf


        //datos a enviar en el mail
        $datos = [
           
            "titulo" => $datosEvento['title'], //asunto de la consulta
            "cliente" => $cliente[0], //nombre del cliente
            "fecha" => $datosEvento['start'],   //fecha de la consulta
            "mensaje" => $datosEvento['descripcion']  //mensaje de la consulta
        ];


        //enviar mail al abogado notificando nueva consulta
        Mail::send("layouts.mail",$datos,function($mensaje ) 
        {
            $datosEvento=request()->except(['_token', '_method']);
            $id_abogado = $datosEvento['id_abogado'];
            $emailabogado = DB::select("SELECT email , id        FROM users WHERE id = $id_abogado");

            //var_dump($emailabogado[0]->email);//bue como le paso estooo
            //$mensaje->to( $emailabogado[0]->email,"ConsultaLegal")->subject("Nueva consulta");
            $mensaje->to("info@consultoriolegal.com.ar" ,"ConsultaLegal")->subject("Nueva consulta");
        });

        //redireccionar a la pagina de consulta exitosa
        return redirect()->route('exito');
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
     * @param  \Illuminate\Http\Request  $Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosEvento=request()->except(['_token', '_method']);
        evento::insert($datosEvento);
        print_r($datosEvento);



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
       
        /*$data['eventos']=evento::all();
        return response()->json($data['eventos']);

        $data['eventos']=evento::where('rol','2')->get();*/
        $user = auth()->id();

        

       // $data['eventos']=DB::select("SELECT * FROM users u, eventos e WHERE u.id = e.id_abogado AND u.rol = 2");
       $data['eventos']=DB::select("
         SELECT  a.id as id_user ,
                u.id as id_user_cliente,
                 e.id as id_evento , 
                 u.*,
                 a.rol as rol , e.title , e.descripcion , e.color , e.textColor , e.start , e.created_at , e.updated_at 
         FROM users u, users a, eventos e 
         WHERE a.id = e.id_abogado
         AND u.id = e.id_usuario
         AND a.rol = 2
         AND a.id = $user");

      /*  var_dump($data['eventos']);*/
        return response()->json($data['eventos']);
      
   

    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showClientes()
    {
        //
       $user = auth()->id();
        /*$data['eventos']=evento::all();
        return response()->json($data['eventos l']);

        $data['eventos']=evento::where('rol','2')->get();*/


        $data['eventos']=DB::select("
             SELECT u.id as id_user , 
                    e.id as id_evento , 
                    u.rol as rol , e.title , e.descripcion , e.color , e.textColor , e.start , e.created_at , e.updated_at
             FROM users u, eventos e 
             WHERE u.id = e.id_usuario
             AND u.rol = 1
             AND u.id = $user");
      /*  var_dump($data['eventos']);*/
        return response()->json($data['eventos']);
            
        
      

    }
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        //
       
        $data['eventos']=evento::all();
        return response()->json($data['eventos']);
  
        
      

    }
    public function get($idabogado = 0)
    {
        $roluser = auth()->user()->rol;
        if($idabogado != 0 && $roluser == 1)
            $evento = $this->showClientes();
        else
            $evento = $this->show();

        
        //var_dump($evento);
        return view("evento.index",[
            'evento' => $evento,
            'idabogado' => $idabogado

        ]);
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
        //verifico si existe el evento
        /*
        $verif = evento::where('id', '=',$id);
        var_dump($verif);
        if(!$verif)
        {
            echo "ERROR: no existe el evento";
            return;
        }
        s*/


         $datosEvento=request()->except(['_token', '_method']);
         $respuesta=evento::where('id', '=',$id)->update($datosEvento);
         return response()->json($respuesta);
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
        $eventos=evento::findOrFail($id);
        evento::destroy($id);
        return response()->json($id);
    }
}

