<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Follow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:15'
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        $profileImage = new Image;
        $profileImage->image = 'default.png';
        $profileImage->userid = $admin->id;
        $profileImage->profile_pic_id = $admin->id;
        $profileImage->save();

        return back()->with('success', 'New user added successfully, you may now login');

    }

    function check(Request $request)
    {
        session()->flush();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15'
        ]);

        $userInfo = Admin::where('email', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'Email address not recognised.');
        } else {
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                $request->session()->put('LoggedUserName', $userInfo->name);
                return redirect('admin/profile');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    function changepasspost(Request $request)
    {
        $request->validate([
            'newpass' => 'required|min:5|max:15',
            'cnewpass' => 'required|min:5|max:15'
        ]);

        if ($request->newpass == $request->cnewpass) {
            $value = $request->session()->get('LoggedUser');
            Admin::where('id', $value)->update(array('password' => Hash::make($request->newpass)));
            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->with('fail', 'Passwords do not match, try again.');
        }
    }

    function changenamepost(Request $request)
    {
        $request->validate(['newname' => 'required']);
        $value = $request->session()->get('LoggedUser');
        Admin::where('id', $value)->update(array('name' => $request->newname));
        return redirect()->back()->with('status', 'Name changed successfully.');
    }

    function logout()
    {
        if (session()->has('LoggedUser')) {
            $user = session('LoggedUserName');
            session()->flush();
            return redirect('/auth/login')->with('goodbye', 'Goodbye, '.$user.'.');
        }
    }

    function delete()
    {
        $value = session('LoggedUser');
        $user = session('LoggedUserName');
        Admin::where('id', $value)->delete();
        $userImages = Image::where('userid', $value)->whereNull('profile_pic_id')->get();
        foreach ($userImages as $image)
        {
            File::delete('uploads/images/'.$image->image);
        }
        Image::where('userid', $value)->whereNull('profile_pic_id')->delete();
        $userProfileImages = Image::where('profile_pic_id', $value)->first();
        if($userProfileImages->image != 'default.png')
        {
            File::delete('uploads/profile_pic/'.$userProfileImages->image);
        }
        Image::where('profile_pic_id', $value)->delete();
        Comment::where('userid', $value)->delete();
        Follow::where('userid', $value)->delete();
        Follow::where('follow', $value)->delete();
        $remainingUsers = Admin::all();
        foreach ($remainingUsers as $admin)
        {
            $admin->followers = Follow::where('follow', $admin->id)->count();
            $admin->following = Follow::where('userid', $admin->id)->count();
            $admin->save();
        }
        session()->flush();
        return redirect('auth/login')->with('delete', 'Account for '.$user.' deleted.');
    }

    function action(Request $request){
        if($request -> ajax())
        {
            $query = $request->get('query');
            if($query != '')
            {
                $data = Admin::limit(7)->where('id', '!=', session('LoggedUser'))->where('name', 'like', '%'.$query.'%')
                ->with('profile_pic')->orderBy('id', 'desc')->get();
            }
            else
            {
                $data = Admin::limit(7)->where('id', '!=', session('LoggedUser'))->orderBy('id', 'desc')->with('profile_pic')->get();
            }
            $total_row = $data->count();
            $output = '';
            if($total_row>0)
            {
                foreach ($data as $row)
                {
                    $output .= '<li><a href="'.url("/admin/profiles/".$row->id).'" style="color:black;"><img src="'.
                        asset("uploads/profile_pic/".$row->profile_pic->image).'">'.$row->name.'</a></li>';
                }
            }
            else
            {
                $output = '<li>No users found</li>';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row,
            );
            echo json_encode($data);
        }
    }

    function followersrecords($id)
    {
        $output = '';
        if($id)
        {
            $userId = $id;
        }
        else
        {
            $userId = session('LoggedUser');
        }
        $data = Follow::where('follow', $userId)->with('followers')->with('profile_pic_followers')->orderBy('id', 'desc')->get();
        if($data->count()>0)
        {
            foreach ($data as $row)
            {
                $output .= '<li><a href="'.url("/admin/profiles/".$row->userid).'" style="color:black;"><img src="'.
                    asset("uploads/profile_pic/".$row->profile_pic_followers->image).'">'.$row->followers->name.'</a></li>';
            }
        }
        else
        {
            $output = 'No records';
        }

            echo json_encode($output);
    }

    function followingrecords($id)
    {
        $output = '';
        if($id)
        {
            $userId = $id;
        }
        else
        {
            $userId = session('LoggedUser');
        }
        $data = Follow::where('userid', $userId)->with('following')->with('profile_pic_following')->orderBy('id', 'desc')->get();
        if($data->count()>0)
        {
            foreach ($data as $row)
            {
                $output .= '<li><a href="'.url("/admin/profiles/".$row->follow).'" style="color:black;"><img src="'.
                    asset("uploads/profile_pic/".$row->profile_pic_following->image).'">'.$row->following->name.'</a></li>';
            }
        }
        else
        {
            $output = 'No records';
        }

        echo json_encode($output);

    }

    function follow($id)
    {
        $follow = new Follow;
        $follow->userid = session('LoggedUser');
        $follow->follow = $id;
        $follow->save();
        $user = Admin::find(session('LoggedUser'));
        $user->following = Follow::where('userid', session('LoggedUser'))->count();
        $user->save();
        $followedUser = Admin::find($id);
        $followedUser->followers = Follow::where('follow', $id)->count();
        $followedUser->save();
        $followers = '<h4 style="cursor: pointer;">'.$followedUser->followers.'<br>Followers</h4>';
        return response()->json(['followers' => $followers]);;
    }

    function unfollow($id)
    {
        Follow::where('userid', session('LoggedUser'))->where('follow', $id)->delete();
        $user = Admin::find(session('LoggedUser'));
        $user->following = Follow::where('userid', session('LoggedUser'))->count();
        $user->save();
        $followedUser = Admin::find($id);
        $followedUser->followers = Follow::where('follow', $id)->count();
        $followedUser->save();
        $followers = '<h4 style="cursor: pointer;">'.$followedUser->followers.'<br>Followers</h4>';
        return response()->json(['followers' => $followers]);
    }

    function portfolio()
    {
        return view('portfolio');
    }

    function learningpage()
    {
        return view('learningpage');
    }

    function changename()
    {
        $LoggedUserInfo = Admin::where('id', session('LoggedUser'))->first();

        return view('admin.changename',[
            'LoggedUserInfo' => $LoggedUserInfo
        ]);
    }

    function changepass()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id', session('LoggedUser'))->first()];
        return view('admin.changepass',$data);
    }

    function profile()
    {
        return view('admin.profile');
    }

    function profiles($id)
    {
        if($id==session('LoggedUser'))
            return redirect('/admin/profile/');
        $data = ['UserInfo'=>Admin::where('id', $id)->with('images')->with('profile_pic')->first(),
        'LoggedUserInfo'=>Admin::where('id', session('LoggedUser'))->with('follows')->first()];
        return view('admin.profiles',$data );
    }

    function settings()
    {
        return view('admin.settings');
    }

    function addimage()
    {
        return view('admin.addimage');
    }

    function news()
    {
        $image = Follow::orderby('id', 'desc')
            ->where('userid', session('LoggedUser'))
            ->with('news')
            ->get();

        return view('admin.news', [
            'image' => $image
        ]);
    }

    function test()
    {
        return view('admin.test');
    }
}
