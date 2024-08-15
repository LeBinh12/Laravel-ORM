<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\UserPhone;
use App\Models\Trademark;
use App\Models\Categories;
use App\Models\Customer;
use App\Models\Products;
use Tymon\JWTAuth\Claims\Custom;

class User extends Controller
{
    //Xuất dữ liệu theo kiểu orm
    public function GetLogin()
    {
        $json = UserPhone::all()->toArray();
        if ($json) {
            return response()->json([
                "status" => 200,
                "data" => $json
            ], 200);
        }


    }
            //Thêm Theo kiểu orm
    public function AddAccount(Request $request){
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $phone = $request->input('phone');
        // $password = $request->input('password');

        // $json = DB::table('login')->insert([
        //     "Email" => $email,
        //     "Phone" => $phone,
        //     "Password" => $password,
        //     "Name" => $name
        // ]);
        // if($json){
        //     $data = DB::table('login')->get()->last();
        //     return response()->json([
        //         "status" => 200,
        //         "data" => $data
        //     ], 200);
        // } else {
        //     return response()->json([
        //         "status" => 400,
        //         "data" => "Add Account Error"
        //     ], 400);
        // }
        $data = new UserPhone;
        $data->Name = $request->name;
        $data->Email = $request->email;
        $data->Password = $request->password;
        $data->Phone = $request->phone;
        $data->save();

        if($data){
            
            return response()->json([
                "status" => 200,
                "data" => $data->toArray(),
            ], 200);
        } else {
            return response()->json([
                "status" => 400,
                "data" => "Add Account Error"
            ], 400);
        }
    }
    //Xóa theo kiểu orm
    public function RemoveAccount(Request $request){
        $json = UserPhone::find($request->id)->delete();
        if($json){
            return response()->json([
                "status"=>200,
                "Message"=>"delete_account successfully"
            ], 200);
        } else {
            return response()->json([
                "status"=>400,
                "Message"=>"delete_account Error"
            ], 400);
        }
    }
    //Update theo kiểu orm 
    public function UpdateAccount(Request $request){
        $data = UserPhone::find($request->id);
        $data->Name = $request->name;
        $data->Email = $request->email;
        $data->Password = $request->password;
        $data->Phone = $request->phone;
        $data->save();
        if($data){
            $json = UserPhone::find($request->id)->toArray();
            return response()->json([
                "status" => 200,
                "data" => $json
            ], 200);
        } else {
            
            return response()->json([
                "status" => 400,
                "data" => "Add Account Error"
            ], 400);
        }
    }
    public function CheckLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $json = DB::table('login')->where('Email',$email)->Where('Password',$password)->get();
        if ($json) {
            return response()->json([
                "status" => 200,
                "data" => $json
            ], 200);
        } else  {
            return response()->json([
                "status" => 400,
                "Message" => "Not Found"
            ], 400);
        }
    }
    public function GetBanner(){
        $json = DB::table('banner')->get();
        return response()->json([
            "status" => 200,
            "data" => $json
        ], 200);
    }
    // public function GetProducts(){
    //     $json = DB::table('products')->get()->;
    // }
    public function GetTrademark(){
        $json = Trademark::all()->toArray();
        return response()->json([
            "status" => 200,
            "data" => $json
        ], 200);
    }
    public function GetCategories(){
        $json = Categories::all()->toArray();
        return response()->json([
            "status" => 200,
            "data" => $json
        ], 200);
    }
    public function AddProducts(Request $request){
        $data = new Products;
        $data->Name = $request->Name;
        $data->Price = $request->Price;
        $data->HoatChat = $request->HoatChat;
        $data->ChiDinh = $request->ChiDinh;
        $data->DangBaoChe = $request->DangBaoChe;
        $data->NoiSanXuat = $request->NoiSanXuat;
        $data->QuyCach = $request->QuyCach;
        $data->LuuY = $request->LuuY;
        $data->ThanhPhan = $request->ThanhPhan;
        $data->ChiDinhChiTiet = $request->ChiDinhChiTiet;
        $data->ChongChiDinh = $request->ChongChiDinh;
        $data->LieuDungCachDung = $request->LieuDungCachDung;
        $data->TacDungPhu = $request->TacDungPhu;
        $data->ThanTrong = $request->ThanTrong;
        $data->TuongTacThuoc = $request->TuongTacThuoc;
        $data->BaoQuan = $request->BaoQuan;
        $data->Image = $request->Image;
        $data->Status = $request->Status;
        $data->Category_id = $request->Category_id;
        $data->Trademark_id = $request->Trademark_id;
        $data->save();
        if($data){
            
            return response()->json([
                "status" => 200,
                "data" => $data->toArray()
            ], 200);
        } else {
            
            return response()->json([
                "status" => 400,
                "data" => "Add Account Error"
            ], 400);
        }
    }
    //tạo tài khoản Middleware
    public function create(){
        Customer::create([
            'name'=> "Customer1",
            'email'=> "Customer1@example.com",
            'password'=> bcrypt(123456),
            "phone" => "123456",
        ]);
    }
}
?>