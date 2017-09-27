<?php

namespace App\Http\Controllers;

use App\CategoriesPage;
use App\Group;
use App\GroupUser;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\EditGroupRequest;
use App\Post;
use App\PostUser;
use Exception;
use Illuminate\Http\Request;
use Session;

class GroupController extends Controller
{
    public function index()
    {
        $categories = CategoriesPage::all();
        $groups = Group::all();
        return view('groups.show-group',['categories'=>$categories,'groups'=>$groups]);
    }

    public function getAdd()
    {
        $categories = CategoriesPage::all();
        return view('groups.add-group',['categories'=>$categories]);
    }

    public function postAdd(CreateGroupRequest $request)
    {
        $group = new Group;
        $group->group_id = $request->group_id;
        $group->group_name = $request->group_name;
        $group->id_category = $request->id_category;
        $group->user_id = Session::get('id_user');
        try{
            $group->save();
            try{
                $group_add = Group::where('group_id',$request->group_id)->first();
                Session::put('id_group',$group_add->id);
                $group_user = new GroupUser;
                $group_user->user_id = Session::get('id_user');
                $group_user->group_id = Session::get('id_group');
                try{
                    $group_user->save();
                    return redirect()->route('showGroup')->with('message','Đã thêm thành công!!');
                }catch (Exception $e){
                    return redirect()->back()->with('error','Lỗi kết nối cơ sở dữ liệu !');
                }
            }catch (Exception $e){
                return redirect()->back()->with('error','Lỗi kết nối cơ sở dữ liệu !');
            }
        }catch (Exception $e){
            return redirect()->back()->with('error','Lỗi kết nối cơ sở dữ liệu !');
        }
    }

    public function getEdit($id)
    {
        $categories = CategoriesPage::all();
        $group = Group::find($id);
        return view('groups.edit-group',['group'=>$group,'categories'=>$categories]);
    }

    public function postEdit(EditGroupRequest $request,$id)
    {
        $group = Group::find($id);
        $group->group_name = $request->group_name;
        $group->id_category = $request->id_category;
        try{
            $group->save();
            return redirect()->route('showGroup')->with('message','Sửa thành công !');
        }catch (Exception $e){
            return redirect()->back()->with('error','Lỗi kết nối cơ sở dữ liệu !');
        }
    }

    public function delete($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect()->back()->with('message','Đã xóa thành công !!');
    }
//Function save post when user post to group or page.
    public function saveIdPost(Request $request)
    {
        $post_id = $_GET['idPost'];
        $user_id = Session::get('id_user');
        $post = new Post;
        $post->post_id = $post_id;
        $post->user_id = $user_id;
        $post->save();

    }
}
