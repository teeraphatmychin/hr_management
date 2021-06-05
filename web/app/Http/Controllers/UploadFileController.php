<?php

namespace App\Http\Controllers;

use App\Forms_Evidence;
use App\Value_of_Each_Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadFileController extends Controller
{

    public function storeImage(Request $request){
//        $image = $request->file('file');
//        if($image!= null){
////            $imageName = str_random(12).$request->file('file')->getClientOriginalExtension();
//            $imageName = "image_".$image->getClientOriginalName();
//            $imageModel = new Forms_Evidence;
//            $imageModel->Form_evi_upload = $imageName;
////            $imageModel->caption = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
//            $request->file('file')->move(public_path() . '/uploads', $imageName);
//            if($imageModel->save()){
////                $images = Forms_Evidence::get();
////                $view = view('partials.imagelist', compact('images'))->render();
////                return response()->json(['id'=>$imageModel->id,'html'=>$view]);
//                return response()->json(['message' => 'GGG'],200);
//            }else{
//                return response()->json(['message' => 'Error while saving image'],400);
//            }
//        }else{
//            return response()->json(['message' => 'Invalid image'],400);
//        }


        $backupDate = $request->input('dateEvident2');
        $datee = explode("-",$request->input('dateEvident2'));
        $dateConvert = $datee[2].$datee[1].$datee[0];

        $image = $request->file('file');
        if($image->getClientOriginalExtension() == "jpeg" || $image->getClientOriginalExtension() == "jpg" || $image->getClientOriginalExtension() == "png"){
            $imageName = Auth::user()->Firstname."_".Auth::user()->Lastname."-".$dateConvert.".".$image->getClientOriginalExtension();
        }
        else if ($image->getClientOriginalExtension() == "pdf"){
            $imageName = Auth::user()->Firstname."_".Auth::user()->Lastname."-".$dateConvert.".".$image->getClientOriginalExtension();
        }

        $upload_success = $image->move(public_path('/uploads'),$imageName);

        if ($upload_success) {
            $saveFmc = Forms_Evidence::where('Date','=',$backupDate)->orWhere('ID_member','=',Auth::user()->ID_member)->get();
            foreach ($saveFmc as $saveFmcs){
                $saveFmcs->Form_evi_upload = $imageName;
                $saveFmcs->save();
            }
            return response()->json($upload_success, 200);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }

    public function deleteFIle(Request $request)
    {
        $delImg = Forms_Evidence::where('Date', '=',$request->input('dateEvident2'))->orWhere('ID_member','=',Auth::user()->ID_member)->get();

        foreach ($delImg as $delImgs){
            $delImgs->Form_evi_upload = "";
            $delImgs->save();
        }
        $datee = explode("-",$request->input('dateEvident2'));
        $dateConvert = $datee[2].$datee[1].$datee[0];
        $imageName = Auth::user()->Firstname."_".Auth::user()->Lastname."-".$dateConvert.".pdf";
        unlink(public_path('/uploads/'.$imageName));

    }


    public function storeImageAddprofile(Request $request){
        $image = $request->file('file');
        if($image->getClientOriginalExtension() == "jpg" || $image->getClientOriginalExtension() == "png"){
            $imageName = $request->input('ffirstname')."_".$request->input('llastname')."_Profile".".".$image->getClientOriginalExtension();
        }

        $upload_success = $image->move(public_path('/User_Profile'),$imageName);

        if ($upload_success) {
            DB::table('profile')
                ->where('Firstname', '=', $request->input('ffirstname'))
                ->Where('Lastname', '=',$request->input('llastname'))
                ->update(['Photo' => $imageName]);
            return response()->json($upload_success, 200);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }

    public function deleteFIleAdd(Request $request)
    {
        DB::table('profile')
            ->where('Firstname', '=', $request->input('ffirstname'))
            ->Where('Lastname', '=',$request->input('llastname'))
            ->update(['Photo' => ""]);

        $imageName = $request->input('ffirstname')."_".$request->input('llastname')."_Profile".".jpg";
        unlink(public_path('/User_Profile/'.$imageName));
    }

    public function storeImageCer(Request $request){

        $image = $request->file('file');
        if($image->getClientOriginalExtension() == "jpg"){
            $imageName = $request->input('CertificateName2')."_Certificate".".".$image->getClientOriginalExtension();
        }

        $upload_success = $image->move(public_path('/certificate'),$imageName);

        if ($upload_success) {
            $saveFmc = Value_of_Each_Certificate::where('Certificate_name','=',$request->input('CertificateName2'))->get();
            foreach ($saveFmc as $saveFmcs){
                $saveFmcs->Certificate_picture = $imageName;
                $saveFmcs->save();
            }
            return response()->json($upload_success, 200);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }

    public function cerAdd()
    {
        return view('edit.edit_content.certificate_editAdd');
    }

    public function deleteFIleCer(Request $request)
    {
        $delImg = Value_of_Each_Certificate::where('Certificate_name','=',$request->input('CertificateName2'))->get();

        foreach ($delImg as $delImgs){
            $delImgs->Certificate_picture = "";
            $delImgs->save();
        }
        $imageName = $request->input('CertificateName2')."_Certificate".".jpg";
        unlink(public_path('/uploads/'.$imageName));

    }

    public function cerEdit()
    {
        return view('edit.edit_content.certificate_edit');
    }

    public function addNameFirstBeforePic(Request $request){
        DB::table('profile')->insert(
            [
                'Firstname' => $request->input('Firstname'),
                'Lastname' => $request->input('Lastname'),
            ]
        );
    }
}
