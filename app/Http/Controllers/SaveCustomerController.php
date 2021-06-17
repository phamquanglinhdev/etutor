<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class SaveCustomerController extends Controller
{
   public function save(Request $request){
       $data = [
           'name' => $request->fullname,
           'email' => $request->email,
           'phone' => $request->phone,
           'message' => $request->message,
       ];
       Customer::create($data);
       echo "<script>Đã gửi lời nhắn của bạn</script>";
       return redirect()->back()->with('status','Đã gửi yêu cầu tư vấn thành công');

   }
}
