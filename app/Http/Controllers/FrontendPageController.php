<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class FrontendPageController extends Controller
{
    function getData($type)
    {
        $page = Page::where('id','=',1)->first();
        $data=null;
        $title=null;
        switch ($type) {
            case 'how_learn':
                $data=$page->how_learn;
                $title='Cách thức học';
                break;
            case 'faq':
                $data=$page->faq;
                $title='Câu hỏi thường gặp';
                break;
            case 'payment':
                $data=$page->payment;
                $title='Học phí và thanh toán';
                break;
            case 'be_teacher':
                $data=$page->be_teacher;
                $title='Trở thành giáo viên';
                break;
            case 'be_client':
                $data=$page->be_client;
                $title='Trở thành đối tác của BizEnglish';
                break;
        }
        return $this->render($data,$title);
    }

    public function render($data,$title){
        return view('frontend.page',['data'=>$data,'title'=>$title]);
    }

}
