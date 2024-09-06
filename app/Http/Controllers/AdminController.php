<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
  public function index (){

      return view ('admin/dashboard');
  }

  public function santri(){

      return view ('admin/santri');
  }

  public function wali_santri(){

      return view ('admin/walisantri');
  }

  public function adminsantri(){

    return view ('admin/adminsantri');
  }

  public function login(){

      return view ('admin/login');
  }

  public function store(Request $request) {
      $password = $request->input('password');
      $encryptPwd = Hash::make($password);
      print($encryptPwd);die;
  }

  public function auth(Request $request)
  {
    $response = array(
        'status' => 500,
        'status_desc'=> 'error',
        'message' => '',
        'is_valid' => false,
        'data' =>'',

    );

    try {
      $email      = $request->input('email');
      $password   = $request->input('password');

      $user = User::where('email','=',$email)->first();

      if(Auth::attempt(['email' => $email, 'password' => $password])) {
          $request->session()->regenerate();
          $response['status'] = 200;
          $response['status_desc'] = 'success';
          $response['is_valid'] = true;
          $response['data'] = Auth::user();
          unset($response['message']);
      }else{
        $response['status'] = 401;
        $response['status_desc'] = 'Bad request';
        $response['is_valid'] = false;
        unset($response['data']);
        unset($response['message']);          
      }    

    } catch (\Exception $e) {
      $response['status'] = 500;
      $response['message'] = $e->getMessage();
      unset($response['data']);
    }

      return response()->json($response);               
  }

  public function logout(Request $request)
  {
    $response = array(
        'status' => 500,
        'status_desc'=> 'error',
        'message' => '',
        'is_valid' => false,

    );

    try{
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $response['status'] = 200;
        $response['status_desc'] = 'success';
        $response['is_valid'] = true;
        unset($response['message']);
        Auth::logout();
    }catch(Throwable $e) {
      $response['status'] = 500;
      $response['message'] = $e->getMessage();
      unset($response['data']);
    }

    return response()->json($response); 
  }

  function ajax_list()
  {
    $list = User::all();
    $data = array();
    $no = $_POST['start'];
    // $no = 1;
    foreach ($list as $item) {
        $no++;
        $row = array();
        $row[] = $item->id;
        $row[] = $item->name;
        $row[] = $item->email;
        /*
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_purchase('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_purchase('."'".$item->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';*/
        $data[] = $row;
    }

    $output = array(
                    "draw" => intval($_POST['draw']),
                    "recordsTotal" => intval($this->count_all()),
                    "recordsFiltered" => intval($this->count_filtered()),
                    "data" => $data,
            );
    //output to json format
    // echo json_encode($output);
    return response()->json($output);
  }

  function count_all()
  {
      $countAll = User::count();
      return $countAll;        
  }

  function count_filtered()
  {
      $countFiltered = User::all()->count();
      return $countFiltered;      
  }
}
