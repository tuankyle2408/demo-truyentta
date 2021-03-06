<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\TheLoai;
use App\Models\Chapter;
use Carbon\Carbon;



class TruyenConTroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function __construct()
    {
        $this->middleware('permission:publish articles|edit articles|delete articles|add articles',['only' => ['index','show']]);
         $this->middleware('permission:add articles', ['only' => ['create','store']]);
         $this->middleware('permission:edit articles', ['only' => ['edit','update']]);
         $this->middleware('permission:delete articles', ['only' => ['destroy']]);
    }


    public function index()

    {

        $list_truyen = Truyen::with('DanhMucTruyen','theloai')->orderBy('id','DESC')->get();

        return view('admincp.Truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $theloai = TheLoai::orderBy('id','DESC')->get();
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();

         return view('admincp.Truyen.create')->with(compact('danhmuc','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [

            'tentruyen' => 'required|unique:truyen|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'tukhoa' => 'required',
            'slug_truyen' => 'required|unique:truyen|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'hinhanh' =>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_with=100,min_height=100,max_width=2200,max_height=2200',
            'tomtat' => 'required',
            'tacgia' => 'required',
            'kichhoat' => 'required',
            'danhmuc' => 'required',
            'theloai' => 'required',


        ],
        [
            'slug_truyen.unique' => 'T??n truy???n ???? t???n t???i, vui l??ng ??i???n m???t t??n kh??c',
            'tentruyen.unique' => 'Slug truy???n ???? t???n t???i, vui l??ng ??i???n m???t slug kh??c',
            'tentruyen.required' => 'Y??u c???u nh???p t??n truy???n',
            'tukhoa.required' => 'Y??u c???u ph???i c?? t??m t???t truy???n',
            'tomtat.required' => 'Y??u c???u ph???i c?? t??m t???t truy???n',
            'tacgia.required' => 'Y??u c???u ph???i c?? t??c gi??? c???a truy???n',
            'slug_truyen.required' => 'Y??u c???u ph???i c?? slug truy???n',
            'hinhanh.required' => 'Y??u c???u ph???i c?? h??nh ???nh truy???n'
    ]

    );
         // $data = $reques->all();
         // dd($data);
        $truyen =  new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        //them anh vao folder

        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName(); //phuong thuc lay ten anh
        $name_image = current(explode('.',$get_name_image)); //Tach ten va duoi mo rong giua dau cham
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

        $get_image->move($path,$new_image);

         $truyen->hinhanh = $new_image;

        $truyen->save();

        return redirect()->back()->with('status','Th??m Truy???n Th??nh C??ng !'); // tra du lieu ve trang da gui du lieu;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theloai = TheLoai::orderBy('id','DESC')->get();
           $truyen = Truyen::find($id);
           $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();



        return view('admincp.Truyen.edit')->with(compact('truyen','danhmuc','theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $request->validate(
            [

            'tentruyen' => 'required|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'slug_truyen' => 'required|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'tomtat' => 'required',
            'tukhoa' => 'required',
            'kichhoat' => 'required',
             'tacgia' => 'required',
            'danhmuc' => 'required',
            'theloai' => 'required',
        ],
        [

        'tentruyen.required' => 'Y??u c???u nh???p t??n truy???n',
        'tukhoa.required' => 'Y??u c???u ph???i c?? t??? kh??a truy???n',
        'tomtat.required' => 'Y??u c???u ph???i c?? t??m t???t truy???n',
        'slug_truyen.required' => 'Y??u c???u ph???i c?? slug truy???n',
        'tacgia.required' => 'Y??u c???u ph???i c?? t??c gi??? c???a truy???n',

    ]

    );
         // $data = $reques->all();
         // dd($data);
        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        //them anh vao folder
        $get_image = $request->hinhanh;

        if($get_image){
             $path = 'public/uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)) {
            unlink($path);
        }
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName(); //phuong thuc lay ten anh
        $name_image = current(explode('.',$get_name_image)); //Tach ten va duoi mo rong giua dau cham
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

        $get_image->move($path,$new_image);

         $truyen->hinhanh = $new_image;
     }

        $truyen->save();

        return redirect()->back()->with('status','C???p Nh???t Truy???n Th??nh C??ng !'); // tra du lieu ve trang da gui du lieu;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)) {
            unlink($path);
        }

        Truyen::find($id)->delete();
        return redirect()->back()->with('status','X??a Truy???n Th??nh C??ng !'); // tra du lieu ve trang da gui du lieu;
    }
}
