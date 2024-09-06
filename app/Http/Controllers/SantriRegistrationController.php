<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;

class SantriRegistrationController extends Controller
{
    public function index (){

        return view ('santri-registration');
    }

    public function store(Request $request)
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

        return response()->json($response);
    }
}
