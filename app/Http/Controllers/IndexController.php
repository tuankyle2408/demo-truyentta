<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\TheLoai;



class IndexController extends Controller
{

    // public function autocomplete_ajax(Request $request){
    //     $data = $request->all();

    //     if($data['query']){

    //         $truyen = Truyen::where('tinhtrang',0)->where('tentruyen','LIKE','%'.$data['query'].'%')->get();

    //         $output = '
    //         <ul class="dropdown-menu" style="display:block;">'
    //         ;

    //         foreach($truyen as $key => $tr){
    //          $output .= '
    //          <li class="li_search_ajax"><a href="#">'.$tr->tentruyen.'</a></li>
    //          ';
    //      }

    //      $output .= '</ul>';
    //      echo $output;
    //  }


    // }
    public function home(){
        $theloai = TheLoai::orderBy('id','DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
         $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->get();
        return view('pages.home')->with(compact('danhmuc','truyen','theloai','slide_truyen'));

    }

    public function danhmuc($slug){
        $theloai = TheLoai::orderBy('id','DESC')->get();
         $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
         $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
         $danhmuc_id = DanhMucTruyen::where('slug_danhmuc',$slug)->first();
         $tendanhmuc = $danhmuc_id->tendanhmuc;
          $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','theloai','slide_truyen'));


    }

    public function theloai($slug){

        $theloai = TheLoai::orderBy('id','DESC')->get();
         $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
         $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
         $theloai_id = TheLoai::where('slug_theloai',$slug)->first();
         $tentheloai = $theloai_id->tentheloai;

          $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->get();
        return view('pages.theloai')->with(compact('danhmuc','truyen','tentheloai','theloai','slide_truyen'));


    }

      public function xemtruyen($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = TheLoai::orderBy('id','DESC')->get();
         $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
           $truyen = Truyen::with('danhmuctruyen','theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();
        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();

        $chapter_cuoi = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai','slide_truyen','chapter_cuoi'));


    }

    public function alltruyen($slug){

        $all_truyen = Truyen::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();

        return view('pages.alltruyen');


    }
    public function xemchapter($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = TheLoai::orderBy('id','DESC')->get();
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
         $truyen = Chapter::where('slug_chapter',$slug)->first();
        $truyen_breadcrumb = Truyen::with('danhmuctruyen','theloai')->where('id',$truyen->truyen_id)->first();
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();
       $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');
       $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');

       // where id hiện tại lớn hơn nghĩa i=i+1, min 1

// i=i-1 max 1

        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
        // Lấy id cao nhất của truyen_id từ trên xuống dưới
        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();
        // sắp xếp từ dưới lên trên
         return view('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','next_chapter','previous_chapter','max_id','min_id','theloai','truyen_breadcrumb','slide_truyen'));

    }
    public function timkiem(){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = TheLoai::orderBy('id','DESC')->get();

        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
        $tukhoa = $_GET['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')->orWhere('tomtat','LIKE','%'.$tukhoa.'%')->orWhere('tacgia','LIKE','%'.$tukhoa.'%')->orWhere('tukhoa','LIKE','%'.$tukhoa.'%')->get();
        return view('pages.timkiem')->with(compact('danhmuc','truyen','theloai','slide_truyen','tukhoa'));

    }
    public function tag($tag){
        $info = Info::find(1);
        $title = 'Tìm kiếm tags';
        //seo
        $meta_desc = 'Tìm kiếm tags';
        $meta_keywords = 'Tìm kiếm tags';
        $url_canonical = \URL::current();
        $og_image = url('public/uploads/logo/'.$info->logo);
         $link_icon = url('public/uploads/logo/'.$info->logo);
        //end seo

        $slide_truyen = Truyen::orderB('id','DESC')->where('kichhoat',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $tags = explode("-", $tag);

        $truyen = Truyen::with('danhmuctruyen','theloai')->where(
            function ($query) use($tags) {
            for ($i = 0; $i < count($tags); $i++){
                $query->orwhere('tukhoa', 'like',  '%' . $tags[$i] .'%');
            }
            })->paginate(12);

        return view('pages.tag')->with(compact('danhmuc','truyen','theloai','slide_truyen','tag','info','title','meta_desc','meta_keywords','url_canonical','og_image','link_icon'));
    }


}

