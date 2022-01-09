<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:publish category|edit category|delete category|add category',['only' => ['index','show']]);
         $this->middleware('permission:add category', ['only' => ['create','store']]);
         $this->middleware('permission:edit category', ['only' => ['edit','update']]);
         $this->middleware('permission:delete category', ['only' => ['destroy']]);
    }

    public function index()
    {
        $danhmuctruyen = DanhMucTruyen::orderBy('id','DESC')->get();
        return view('admincp.DanhMucTruyen.index')->with(compact('danhmuctruyen'));
           }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.DanhMucTruyen.create');
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

            'tendanhmuc' => 'required|unique:danhmuc|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'slug_danhmuc' => 'required|unique:danhmuc|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
        ],
        [
            'tendanhmuc.unique' => 'Tên danh mục đã tồn tại, vui lòng điền một tên khác',
             'slug_danhmuc.unique' => 'Slug danh mục đã tồn tại, vui lòng điền một slug khác',
            'tendanhmuc.required' => 'Yêu cầu nhập tên danh mục',
        'mota.required' => 'Yêu cầu phải có mô tả',
    ]

    );
         // $data = $reques->all();
         // dd($data);
        $DanhMucTruyen =  new DanhMucTruyen();
        $DanhMucTruyen->tendanhmuc = $data['tendanhmuc'];
        $DanhMucTruyen->slug_danhmuc = $data['slug_danhmuc'];
        $DanhMucTruyen->mota = $data['mota'];
        $DanhMucTruyen->kichhoat = $data['kichhoat'];
        $DanhMucTruyen->save();

        return redirect()->back()->with('status','Thêm Danh Mục Thành Công !'); // tra du lieu ve trang da gui du lieu;
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
          $danhmuc = DanhMucTruyen::find($id);
            return view('admincp.DanhMucTruyen.edit')->with(compact('danhmuc'));

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
        //Kiem tra du lieu
       $data = $request->validate(
            [

            'tendanhmuc' => 'required|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'slug_danhmuc' => 'required|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
        ],
        [   'slug_danhmuc.required' => 'Yêu cầu nhập Slug danh mục',
            'tendanhmuc.required' => 'Yêu cầu nhập tên danh mục',
        'mota.required' => 'Yêu cầu phải có mô tả',
    ]

    );
         // $data = $request->all();
         // dd($data);
        $DanhMucTruyen = DanhMucTruyen::find($id);
        $DanhMucTruyen->tendanhmuc = $data['tendanhmuc'];
         $DanhMucTruyen->slug_danhmuc = $data['slug_danhmuc'];
        $DanhMucTruyen->mota = $data['mota'];
        $DanhMucTruyen->kichhoat = $data['kichhoat'];
        $DanhMucTruyen->save();

        return redirect()->back()->with('status','Cập Nhật Danh Mục Thành Công !'); // tra du lieu ve trang da gui du lieu;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       DanhMucTruyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa Danh Mục Thành Công!!');
    }
}
