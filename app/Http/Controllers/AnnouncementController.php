<?php

namespace App\Http\Controllers;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class AnnouncementController extends Controller
{
    public function announcement (){

       
        $current_date = Carbon::today()->format('Y-m-d');
        $announcement = DB::table('announcement')->groupBy('id')->get();
        $id =null;
        
        foreach ($announcement as $value) {
            if($value->unpublish_date < $current_date){
                $id = Announcement::find($value->id);
                $id->delete();
            }
         
            
        }
        // dd($current_date);
       
        return view('announcement',compact('current_date','announcement'));
    }   

    public function post_announcement (Request $request){

      

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'announcement' => 'required',
            'publish_date' => 'required|date',
            'unpublish_date' => 'required|date',
        ]);
   
     
        if ($validator->passes()) {
            if($request->input('unpublish_date') >= $request->input('publish_date') ){
                $announcement = new Announcement();
                $announcement->title = $request->input('title');
                $announcement->body = $request->input('announcement');
                $announcement->publish_date = $request->input('publish_date');
                $announcement->unpublish_date = $request->input('unpublish_date');
                $announcement->save();
                // return redirect()->back()->with('success', "DataSave");
                return response()->json(['valid'=>'yes']);
            }else{
                return response()->json(['valid'=>'no']);

            }
           
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    

    }


    public function get_announcement($id){

    
        $id = DB::table('announcement')->where('id',$id)->get();
        return response()->json(['announcement'=>$id]);

    }

    public function update_announcement(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'announcement' => 'required',
            'publish_date' => 'required|date',
            'unpublish_date' => 'required|date',
        ]);
   
     
        if ($validator->passes()) {
            if($request->input('unpublish_date') >= $request->input('publish_date') ){
               
                $id = $request->input('announcement_id');
                $announcement = Announcement::find($id);
                $announcement->title = $request->input('title');
                $announcement->body = $request->input('announcement');
                $announcement->publish_date = $request->input('publish_date');
                $announcement->unpublish_date = $request->input('unpublish_date');
                $announcement->update();
                // return redirect()->back()->with('success', "DataSave");
                return response()->json(['valid'=>'yes']);
            }else{
                return response()->json(['valid'=>'no']);

            }
           
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function delete_announcement(Request $request){

 
        $id = $request->input('delete_id');
        $announcement = Announcement::find($id);
     
        $announcement->delete();
        alert()->success('Deleted','Announcement has been deleted successfully.');
        return redirect()->back();
     
        
    }

}
