<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class JabodetabekFormController extends Controller
{
    public function index()
    {
        $forms = FormData::all();
        return view('forms.jabodetabek.index',compact('forms'));
    }

    public function createStepOne(Request $request)
    {
        $forms = $request->session()->get('form_data');

        return view('forms.jabodetabek.create-step-one',compact('forms'));
    }

    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'profesi' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required|numeric',
            'tingkat_pendidikan' => 'required',
            'ukuran_keluarga' => 'required|numeric',
            'kedudukan_keluarga' => 'required',
            'kendaraan_pribadi' => 'required',
        ]);

        if(empty($request->session()->get('form_data'))){
            $forms = new FormData();
            $forms->fill($validatedData);
            $request->session()->put('form_data', $forms);
        }else{
            $forms = $request->session()->get('form_data');
            $forms->fill($validatedData);
            $request->session()->put('form_data', $forms);
        }

        return redirect()->route('forms.jabodetabek.create.step.two.1');
    }

    public function createStepTwo1(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.jabodetabek.create-step-two-1',compact('forms'));
    }

    public function postCreateStepTwo1(Request $request)
    {
        $validatedData = $request->validate([
            'alamat_kecamatan' => 'required',
            'alamat_kelurahan' => 'required',
            'alamat_kota' => 'required',
            'alamat_latitude' => 'required',
            'alamat_longitude' => 'required'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        return redirect()->route('forms.jabodetabek.create.step.two.2');
    }

    public function createStepTwo2(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.jabodetabek.create-step-two-2',compact('forms'));
    }

    public function postCreateStepTwo2(Request $request)
    {
        $validatedData = $request->validate([
            'tujuan_kecamatan' => 'required',
            'tujuan_kelurahan' => 'required',
            'tujuan_kota' => 'required',
            'tujuan_latitude' => 'required',
            'tujuan_longitude' => 'required'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        return redirect()->route('forms.jabodetabek.create.step.three');
    }

    public function createStepThree(Request $request)
    {
        $forms = $request->session()->get('form_data');

        return view('forms.jabodetabek.create-step-three',compact('forms'));
    }

    public function postCreateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'option' => 'required'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        if ($forms->option && $forms->kendaraan_pribadi) {
            return redirect()->route('forms.jabodetabek.create.step.four.a');
        } else if (!$forms->option && $forms->kendaraan_pribadi){
            return redirect()->route('forms.jabodetabek.create.step.four.b1');
        } else {
            return redirect()->route('forms.jabodetabek.create.step.four.c');
        }
    }

    public function createStepFourA(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.jabodetabek.create-step-four-A',compact('forms'));
    }

    public function postCreateStepFourA(Request $request)
    {
        $validatedData = $request->validate([
            'maksud_perjalanan' => 'required',
            'frekuensi_perjalanan' => 'required|numeric',
            'kendaraan_berangkat_mobil' => 'required_without_all:kendaraan_berangkat_motor,kendaraan_berangkat_lainnya',
            'kendaraan_berangkat_motor' => 'required_without_all:kendaraan_berangkat_mobil,kendaraan_berangkat_lainnya',
            'kendaraan_berangkat_lainnya' => 'required_without_all:kendaraan_berangkat_mobil,kendaraan_berangkat_motor',
            'kendaraan_pulang_mobil' => 'required_without_all:kendaraan_pulang_motor,kendaraan_pulang_lainnya',
            'kendaraan_pulang_motor' => 'required_without_all:kendaraan_pulang_mobil,kendaraan_pulang_lainnya',
            'kendaraan_pulang_lainnya' => 'required_without_all:kendaraan_pulang_mobil,kendaraan_pulang_motor',
            'biaya_parkir' => 'required|numeric',
            'biaya_bbm' => 'required|numeric',
            'perjalanan_total' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'preferensi' => 'required|numeric'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        $forms->save();

        $request->session()->forget('form_data');

        return redirect()->route('forms.jabodetabek.success');

    }

    public function createStepFourB1(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.jabodetabek.create-step-four-B1',compact('forms'));
    }

    public function postCreateStepFourB1(Request $request)
    {
        $validatedData = $request->validate([
            'maksud_perjalanan' => 'required',
            'frekuensi_perjalanan' => 'required|numeric',
            'kendaraan_berangkat_krl' => 'required_without_all:kendaraan_berangkat_lrt,kendaraan_berangkat_mrt,kendaraan_berangkat_brt,kendaraan_berangkat_angkutan_kota,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_lrt' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_mrt,kendaraan_berangkat_brt,kendaraan_berangkat_angkutan_kota,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_mrt' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_lrt,kendaraan_berangkat_brt,kendaraan_berangkat_angkutan_kota,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_brt' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_lrt,kendaraan_berangkat_mrt,kendaraan_berangkat_angkutan_kota,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_angkutan_kota' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_lrt,kendaraan_berangkat_mrt,kendaraan_berangkat_brt,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_ojol' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_lrt,kendaraan_berangkat_mrt,kendaraan_berangkat_brt,kendaraan_berangkat_angkutan_kota',
            'kendaraan_pulang_krl' => 'required_without_all:kendaraan_pulang_lrt,kendaraan_pulang_mrt,kendaraan_pulang_brt,kendaraan_pulang_angkutan_kota,kendaraan_pulang_ojol',
            'kendaraan_pulang_lrt' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_mrt,kendaraan_pulang_brt,kendaraan_pulang_angkutan_kota,kendaraan_pulang_ojol',
            'kendaraan_pulang_mrt' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_lrt,kendaraan_pulang_brt,kendaraan_pulang_angkutan_kota,kendaraan_pulang_ojol',
            'kendaraan_pulang_brt' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_lrt,kendaraan_pulang_mrt,kendaraan_pulang_angkutan_kota,kendaraan_pulang_ojol',
            'kendaraan_pulang_angkutan_kota' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_lrt,kendaraan_pulang_mrt,kendaraan_pulang_brt,kendaraan_pulang_ojol',
            'kendaraan_pulang_ojol' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_lrt,kendaraan_pulang_mrt,kendaraan_pulang_brt,kendaraan_pulang_angkutan_kota',
            'tarif' => 'required|numeric',
            'waktu_transit' => 'required|numeric',
            'transport_henti_jalan_kaki' => 'required_without_all:transport_henti_ojol,transport_henti_angkutan_umum_lain,transport_henti_diantar,transport_henti_pribadi',
            'transport_henti_ojol' => 'required_without_all:transport_henti_jalan_kaki,transport_henti_angkutan_umum_lain,transport_henti_diantar,transport_henti_pribadi',
            'transport_henti_angkutan_umum_lain' => 'required_without_all:transport_henti_jalan_kaki,transport_henti_ojol,transport_henti_diantar,transport_henti_pribadi',
            'transport_henti_diantar' => 'required_without_all:transport_henti_jalan_kaki,transport_henti_ojol,transport_henti_angkutan_umum_lain,transport_henti_pribadi',
            'transport_henti_pribadi' => 'required_without_all:transport_henti_jalan_kaki,transport_henti_ojol,transport_henti_angkutan_umum_lain,transport_henti_diantar',
            'waktu_tunggu' => 'required|numeric',
            'waktu_perjalanan' => 'required|numeric',
            'waktu_henti_tujuan' => 'required|numeric',
            'transport_akhir_jalan_kaki' => 'required_without_all:transport_akhir_ojol,transport_akhir_angkutan_umum_lain,transport_akhir_dijemput,transport_akhir_pribadi',
            'transport_akhir_ojol' => 'required_without_all:transport_akhir_jalan_kaki,transport_akhir_angkutan_umum_lain,transport_akhir_dijemput,transport_akhir_pribadi',
            'transport_akhir_angkutan_umum_lain' => 'required_without_all:transport_akhir_jalan_kaki,transport_akhir_ojol,transport_akhir_dijemput,transport_akhir_pribadi',
            'transport_akhir_dijemput' => 'required_without_all:transport_akhir_jalan_kaki,transport_akhir_ojol,transport_akhir_angkutan_umum_lain,transport_akhir_pribadi',
            'transport_akhir_pribadi' => 'required_without_all:transport_akhir_jalan_kaki,transport_akhir_ojol,transport_akhir_angkutan_umum_lain,transport_akhir_dijemput',
            'waktu_total' => 'required|numeric',
            'pendapatan' => 'required|numeric',
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        return redirect()->route('forms.jabodetabek.create.step.four.b2');

    }

    public function createStepFourB2(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.jabodetabek.create-step-four-B2',compact('forms'));
    }

    public function postCreateStepFourB2(Request $request)
    {
        $validatedData = $request->validate([
            'biaya_parkir' => 'required|numeric',
            'biaya_bbm' => 'required|numeric',
            'perjalanan_total' => 'required|numeric',
            'preferensi' => 'required|numeric'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        $forms->save();

        $request->session()->forget('form_data');

        return redirect()->route('forms.jabodetabek.success');
    }

    public function createStepFourC(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.jabodetabek.create-step-four-C',compact('forms'));
    }

    public function postCreateStepFourC(Request $request)
    {
        $validatedData = $request->validate([
            'maksud_perjalanan' => 'required',
            'frekuensi_perjalanan' => 'required|numeric',
            'kendaraan_berangkat_krl' => 'required_without_all:kendaraan_berangkat_lrt,kendaraan_berangkat_mrt,kendaraan_berangkat_brt,kendaraan_berangkat_angkutan_kota,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_lrt' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_mrt,kendaraan_berangkat_brt,kendaraan_berangkat_angkutan_kota,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_mrt' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_lrt,kendaraan_berangkat_brt,kendaraan_berangkat_angkutan_kota,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_brt' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_lrt,kendaraan_berangkat_mrt,kendaraan_berangkat_angkutan_kota,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_angkutan_kota' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_lrt,kendaraan_berangkat_mrt,kendaraan_berangkat_brt,kendaraan_berangkat_ojol',
            'kendaraan_berangkat_ojol' => 'required_without_all:kendaraan_berangkat_krl,kendaraan_berangkat_lrt,kendaraan_berangkat_mrt,kendaraan_berangkat_brt,kendaraan_berangkat_angkutan_kota',
            'kendaraan_pulang_krl' => 'required_without_all:kendaraan_pulang_lrt,kendaraan_pulang_mrt,kendaraan_pulang_brt,kendaraan_pulang_angkutan_kota,kendaraan_pulang_ojol',
            'kendaraan_pulang_lrt' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_mrt,kendaraan_pulang_brt,kendaraan_pulang_angkutan_kota,kendaraan_pulang_ojol',
            'kendaraan_pulang_mrt' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_lrt,kendaraan_pulang_brt,kendaraan_pulang_angkutan_kota,kendaraan_pulang_ojol',
            'kendaraan_pulang_brt' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_lrt,kendaraan_pulang_mrt,kendaraan_pulang_angkutan_kota,kendaraan_pulang_ojol',
            'kendaraan_pulang_angkutan_kota' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_lrt,kendaraan_pulang_mrt,kendaraan_pulang_brt,kendaraan_pulang_ojol',
            'kendaraan_pulang_ojol' => 'required_without_all:kendaraan_pulang_krl,kendaraan_pulang_lrt,kendaraan_pulang_mrt,kendaraan_pulang_brt,kendaraan_pulang_angkutan_kota',
            'tarif' => 'required|numeric',
            'waktu_transit' => 'required|numeric',
            'transport_henti_jalan_kaki' => 'required_without_all:transport_henti_ojol,transport_henti_angkutan_umum_lain,transport_henti_diantar,transport_henti_pribadi',
            'transport_henti_ojol' => 'required_without_all:transport_henti_jalan_kaki,transport_henti_angkutan_umum_lain,transport_henti_diantar,transport_henti_pribadi',
            'transport_henti_angkutan_umum_lain' => 'required_without_all:transport_henti_jalan_kaki,transport_henti_ojol,transport_henti_diantar,transport_henti_pribadi',
            'transport_henti_diantar' => 'required_without_all:transport_henti_jalan_kaki,transport_henti_ojol,transport_henti_angkutan_umum_lain,transport_henti_pribadi',
            'transport_henti_pribadi' => 'required_without_all:transport_henti_jalan_kaki,transport_henti_ojol,transport_henti_angkutan_umum_lain,transport_henti_diantar',
            'waktu_tunggu' => 'required|numeric',
            'waktu_perjalanan' => 'required|numeric',
            'waktu_henti_tujuan' => 'required|numeric',
            'transport_akhir_jalan_kaki' => 'required_without_all:transport_akhir_ojol,transport_akhir_angkutan_umum_lain,transport_akhir_dijemput,transport_akhir_pribadi',
            'transport_akhir_ojol' => 'required_without_all:transport_akhir_jalan_kaki,transport_akhir_angkutan_umum_lain,transport_akhir_dijemput,transport_akhir_pribadi',
            'transport_akhir_angkutan_umum_lain' => 'required_without_all:transport_akhir_jalan_kaki,transport_akhir_ojol,transport_akhir_dijemput,transport_akhir_pribadi',
            'transport_akhir_dijemput' => 'required_without_all:transport_akhir_jalan_kaki,transport_akhir_ojol,transport_akhir_angkutan_umum_lain,transport_akhir_pribadi',
            'transport_akhir_pribadi' => 'required_without_all:transport_akhir_jalan_kaki,transport_akhir_ojol,transport_akhir_angkutan_umum_lain,transport_akhir_dijemput',
            'waktu_total' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'preferensi' => 'required|numeric'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);
        // dd($validatedData);
        $forms->save();

        $request->session()->forget('form_data');

        return redirect()->route('forms.jabodetabek.success');
    }
    public function formSuccess(Request $request){

        return view('forms.jabodetabek.forms-success');
    }
    public function postForm(Request $request)
    {
        $forms = $request->session()->get('form_data');
        $forms->save();

        $request->session()->forget('form_data');

        return redirect()->route('forms.jabodetabek.index');
    }
}
