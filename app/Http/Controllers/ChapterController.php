<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;
class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:publish articles|edit articles|delete articles|add articles',['only' => ['index','show']]);
         $this->middleware('permission:add articles', ['only' => ['create','store']]);
         $this->middleware('permission:edit articles', ['only' => ['edit','update']]);
         $this->middleware('permission:delete articles', ['only' => ['destroy']]);
    }

    public function index()

    {   $chapter = Chapter::with('truyen')->orderBy('id','DESC')->get();
        return view('admincp.chapter.index')->with(compact('chapter'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admincp.chapter.create')->with(compact('truyen'));
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

            'tieude' => 'required|unique:chapter|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'slug_chapter' => 'required|unique:chapter|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'noidung' => 'required',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'truyen_id' => 'required'

        ],
        [
            'slug_chapter.unique' => 'Slug Chapter đã tồn tại, vui lòng điền một slug khác',
            'slug_chapter.required' => 'Yêu cầu phải có slug truyện',
             'tieude.unique' => 'Tiêu đề đã tồn tại, vui lòng điền một tiêu đề khác',
            'tieude.required' => 'Yêu cầu nhập tiêu đề',
        'tomtat.required' => 'Yêu cầu phải có tóm tắt truyện',
        'noidung.required' => 'Yêu cầu phải có nội dung truyện'


    ]

    );
         // $data = $reques->all();
         // dd($data);
        $chapter =  new Chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->noidung = $data['noidung'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];




        $chapter->save();

        return redirect()->back()->with('status','Thêm Chapter Thành Công !'); // tra du lieu ve trang da gui du lieu;
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
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admincp.chapter.edit')->with(compact('truyen','chapter'));
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

            'tieude' => 'required|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'slug_chapter' => 'required|max:255',  /**Yeu cau dung title doc nhat va ky tu 255 tro xuong */
            'noidung' => 'required',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'truyen_id' => 'required'

        ],
        [
            'slug_chapter.unique' => 'Slug Chapter đã tồn tại, vui lòng điền một slug khác',
            'slug_chapter.required' => 'Yêu cầu phải có slug truyện',
             'tieude.unique' => 'Tiêu đề đã tồn tại, vui lòng điền một tiêu đề khác',
            'tieude.required' => 'Yêu cầu nhập tiêu đề',
        'tomtat.required' => 'Yêu cầu phải có tóm tắt truyện',
        'noidung.required' => 'Yêu cầu phải có nội dung truyện'


    ]

    );
         // $data = $reques->all();
         // dd($data);
        $chapter =  Chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->noidung = $data['noidung'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];




        $chapter->save();

        return redirect()->back()->with('status','Cập Nhật Chapter Thành Công !'); // tra du lieu ve trang da gui du lieu;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status','Xóa chapter thành công');
    }
}
