<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;

class SantriController extends Controller
{
  function ajax_edit($id)
  {
    $santri = Santri::find($id);
    return response()->json($santri);
  }

  function ajax_add(Request $request)
  {
    $response = array(
        'status' => 500,
        'status_desc'=> 'error',
        'message' => '',
        'data' => '',

    );
    try {
        $santri = new Santri;
        $santri->id = random_int(100000, 999999);
        $santri->nama = $request->nama;
        $santri->jk = $request->jk;
        $santri->tempat = $request->tempat;
        $santri->tgllahir = $request->tgllahir;
        $santri->handphone = $request->handphone;
        $santri->email = $request->email;
        $santri->alamat = $request->alamat;

        if ($santri->save()){
            $response['status'] = 200;
            $response['status_desc'] = 'success';
            $response['data'] = $santri;
        }

    } catch (\Exception $e) {
        $response['status'] = 400;
        $response['message'] = $e->getMessage();
        unset($response['data']);
    }

    return response()->json($response, $response['status']);
  }

  function ajax_update(Request $request)
  {
    $response = array(
        'status' => 500,
        'status_desc'=> 'error',
        'message' => '',
        'data' => '',

    );
    try {

        $santri = Santri::find($request->id);

        if($santri === null){
          $response['message'] = 'ID tidak ditemukan';
          unset($response['data']);
          return response()->json($response, $response['status']);
        }
         
        $santri->id = $request->id;
        $santri->nama = $request->nama;
        $santri->jk = $request->jk;
        $santri->tempat = $request->tempat;
        $santri->tgllahir = $request->tgllahir;
        $santri->handphone = $request->handphone;
        $santri->email = $request->email;
        $santri->alamat = $request->alamat;

        if ($santri->save()){
            $response['status'] = 200;
            $response['status_desc'] = 'success';
            $response['data'] = $santri;
            unset($response['message']);
        }

    } catch (\Exception $e) {
        $response['status'] = 400;
        $response['message'] = $e->getMessage();
        unset($response['data']);
    }

    return response()->json($response, $response['status']);
  }

  function ajax_delete($id)
  {
    $response = array(
        'status' => 500,
        'status_desc'=> 'error',
        'message' => '',
        'data' => '',

    );
    try {

        $santri = Santri::find($id);

        if($santri === null){
          $response['message'] = 'ID tidak ditemukan';
          unset($response['data']);
          return response()->json($response, $response['status']);
        }

        if ($santri->delete()){
            $response['status'] = 200;
            $response['status_desc'] = 'success';
            $response['data'] = $santri;
            unset($response['message']);
        }

    } catch (\Exception $e) {
        $response['status'] = 400;
        $response['message'] = $e->getMessage();
        unset($response['data']);
    }

    return response()->json($response, $response['status']);
  }

  function ajax_list()
  {
    $list = Santri::all();
    $data = array();
    $no = $_POST['start'];
    // $no = 1;
    foreach ($list as $item) {
        $no++;
        $row = array();
        $row[] = $item->id;
        $row[] = $item->nama;
        if($item->jk === 'L'){
          $item->jk = 'Laki-laki';
        }elseif($item->jk === 'P'){
          $item->jk = 'Perempuan';
        }
        $row[] = $item->jk;
        $row[] = $item->tempat.','.$item->tgllahir;
        $row[] = $item->handphone;
        $row[] = $item->email;
        $row[] = $item->alamat;
        
        $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>        
          <a class="btn btn-outline-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_by_id('."'".$item->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete
          </a>';
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
      $countAll = Santri::count();
      return $countAll;        
  }

  function count_filtered()
  {
      $countFiltered = Santri::all()->count();
      return $countFiltered;      
  }

  public function hitung()
  {
      $countAll = Santri::count();
      return response(['data' => $countAll], 200);
  }
}
