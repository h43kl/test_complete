<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    
    public function index()
    {

        return view('user');
    }

    public function store( Request $request )
    {
       
        $val = $request->all();

        if (isset($val['id'])) {


            if (isset($val['images'])) {
                
                    $rules=[
                        'name'              => 'required|min:3',
                        'password'          => 'required | string | min:6 ',
                        'email'             => 'required| string| email| max:255',
                        'images'             => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=200,height=200'
                    ];

                    $messages = [
                        'required'  => 'The :attribute field is required.',
                        'unique'    => ':attribute is already used'
                    ];
            
                    $validasi=\Validator::make($request->all(),$rules, $messages);

                

                    if ($validasi->fails()) {
                        
                        $fail =array(
                            'success'=>false,
                            'pesan'=>'Validasi error',
                            'errors'=>$validasi->errors()->all()
                        );
                        
                        return response()->json([
                            'status' => 500,
                            'data'   => $fail
                        ]);

                    } else {

                        $foto = $val['images'];
            
                        $val['password']  = Hash::make($val['password']);
                        $uploaded_file = $foto;
                        $name           = $uploaded_file->getClientOriginalName();
                        $filename       = $name;
                    

                        $destinationPath = 'public/foto_profile';
                        $uploaded_file->move($destinationPath, $filename);


                        $user = User::where('id',$val['id'])->update([
                                    'name'    => $val['name'],
                                    'email'   => $val['email'],
                                    'password'=> $val['password'],
                                    'image'   => $filename,
                                ]);

                        return response()->json([
                            'status' => 200,
                            'data'   => 'Update Data Berhasil'
                        ]);
                    }

            } else if (isset($val['password'])) {

              
                $rules=[
                    'name'              => 'required|min:3',
                    'password'          => 'required | string | min:6 ',
                    'email'             => 'required| string| email| max:255',
                    
                ];
    
                $messages = [
                    'required'  => 'The :attribute field is required.',
                    'unique'    => ':attribute is already used'
                ];
        
                $validasi=\Validator::make($request->all(),$rules, $messages);
    
            
    
                if ($validasi->fails()) {
                    
                    $fail =array(
                        'success'=>false,
                        'pesan'=>'Validasi error',
                        'errors'=>$validasi->errors()->all()
                    );
                    
                    return response()->json([
                        'status' => 500,
                        'data'   => $fail
                    ]);
    
                } else {


                    $val['password']  = Hash::make($val['password']);
                    $u = User::where('id', $request->id)->update([
                        'name' => $val['name'],
                        'email' => $val['email'],
                        'password' => $val['password'],
                        ]);

                        return response()->json([
                            'status' => 200,
                            'data'   => 'Update Data Berhasil'
                        ]);

                }

            } else {

           
                $u = User::where('id', $request->id)->update([
                    'name' => $val['name'],
                    'email' => $val['email'],
                    ]);

                    return response()->json([
                        'status' => 200,
                        'data'   => 'Update Data Berhasil'
                    ]);
            }



            
        } else {

            $rules=[
                'name'              => 'required|min:3',
                'password'          => 'required | string | min:6 ',
                'email'             => 'required| string| email| max:255| unique:users',
                'images'             => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:width=200,height=200'
            ];

            $messages = [
                'required'  => 'The :attribute field is required.',
                'unique'    => ':attribute is already used'
            ];
    
            $validasi=\Validator::make($request->all(),$rules, $messages);

        

            if ($validasi->fails()) {
                
                $fail =array(
                    'success'=>false,
                    'pesan'=>'Validasi error',
                    'errors'=>$validasi->errors()->all()
                );
                
                return response()->json([
                    'status' => 500,
                    'data'   => $fail
                ]);

            } else {
            
                $data = $request->all();

                $data['password']  = Hash::make($data['password']);
            
                $foto = $data['images'];
      
                
                $uploaded_file = $foto;
                $name           = $uploaded_file->getClientOriginalName();
                $filename       = $name;
            

                $destinationPath = 'public/foto_profile';
                $uploaded_file->move($destinationPath, $filename);


                $user = User::create([
                            'name'    => $data['name'],
                            'email'   => $data['email'],
                            'password'=> $data['password'],
                            'image'   => $filename,
                        ]);

                return response()->json([
                    'status' => 200,
                    'data'   => 'Input Data Berhasil'
                ]);
                
            }
        }
        
               
        
    }

    public function list( Request $request )
    {
        
        $data = User::all();
       
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('image', function ($data) {
                    
                        $btn = '<a href="#" onclick="image_file('.$data['id'].')" class="btn btn-info btn-sm show" "> Lihat gambar </a>';
                        return $btn;
                    })
                    ->editColumn('action', function ($data) {

                        $btn = '<td>
                                    <div class="dropdown ml-auto text-right">
                                        <div class="btn-link" data-toggle="dropdown">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                    </circle>
                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                    </circle>
                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" onclick="show('.$data['id'].')"  href="#">Edit</a>
                                            <a class="dropdown-item" onclick="del('.$data['id'].')" href="#">Delete</a>
                                        </div>
                                    </div>
                                </td>';
                        return $btn;
                    })
                    ->rawColumns(['no','image', 'action'])
                    ->make(true);
    }

    public function file_image($id)
    {
        
        $user = User::find($id);
       
	    return response()->json([
	      'data' => $user
	    ]);


    }

    public function user_edit($id)
    {
        
        $user = User::where('id',$id)->first();
       
	    return response()->json([
	      'data' => $user
	    ]);


    }

    public function delete($id)
    {
        
        $user = User::find($id);
        

        if (isset($user)) {

            $user->delete();
        }else {
            return redirect()->back();
        }

        return response()->json([
            'response' => 200, 
          ]);

    }



}
