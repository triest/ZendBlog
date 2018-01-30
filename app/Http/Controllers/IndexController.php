<?php

namespace App\Http\Controllers;

use App\PositionModel;
use App\ProfessionList;
use App\userModel;
use Illuminate\Http\Request;

use App\Article;

class IndexController extends Controller
{
    //
    protected $message;
    protected $header;
    public function __construct(){
           $this->header='Hello word';
           $this->message='message';
    }



    public function userslist(){
        $articles=userModel::select(['fam','im','ot','log','date','position'])->get();
        dump($articles);
        return view('users-view')->with(['message'=>$this->message,
                'header'=>$this->header,
                'articles'=>$articles        ]
        );
    }



    public function UserShow($log){
         /*   dump($log);*/
            $user=userModel::select(['fam','im','ot','phone','log','date','position'])->where('log',$log)->first();
            /*dump($user);*/
            return view('user-show')->with(['message'=>$this->message,
            'user'=>$user
    ]);
    }

    public  function  reg(){
        $positions=new PositionModel;
        $positions=PositionModel::all(['position']);
        dump($positions);
        return view('demo-form',compact('positions',$positions));
    }



    public function reg2(Request $request){
        dump($request);
        $this->validate($request,[
            'fam'=>'required|max:255',
            'im'=>'required|max:255',
            'ot'=>'required|max:255',
            'log'=>'required|max:255',
            'pass'=>'required|max:255',
            'phone'=>'required|max:255',
            'Регистрацияd'=>'require|max:255'
        ]);
        $data=$request->all();
        $user=new userModel;
        $unickUser=new userModel();
        $log=$request->input('log');
        $unickUser=userModel::select(['log'])->where('log',$log)->first();
        if($unickUser!=null){
            $articles=userModel::select(['fam','im','ot','log','date','position'])->get();
            $positions=PositionModel::select(['id','position'])->get();
            return view('users-view')->with(['message'=>$this->message,
                'header'=>$this->header,
                'articles'=>$articles,
                  'positions'=>$positions]
            );
        }
            else{
                return view('already_exists.blade');
            }
       $user->fill($data);
        $user->save();
        ;

        $articles=userModel::select(['fam','im','ot','log','date','position'])->get();
        $positions=new PositionModel();

        $positions=PositionModel::select(['id','position'])->get();
       /* dump($positions);*/
/*
        return view('users-view')->with(['message'=>$this->message,
                'header'=>$this->header,
                'articles'=>$articles,
                'positions'=>$positions
            ]
        );*/
        return view('users-view');
    }




    public function UserChange($log){
        $user=userModel::select(['fam','im','ot','phone','log','position','date'])->where('log',$log)->first();
        $positions=PositionModel::all(['position']);
        dump($user);
        return view('user-change',compact('positions',$positions))->with(['message'=>$this->message,
            'user'=>$user
        ]);

    }
/*
    public function UserChange2(Request $request){
        dump($request);
        $data=$request->all();
        $log = $request->input('log');
        dump($log);
        $user=userModel::select(['fam','im','ot','phone','log','pass'])->where('log',$log)->first();

        dump($user);
        $user->save;
    }
*/
    public function UserChange2(Request $request){
        $data=$request->all();
      /*  dump($request);*/
        $log2 = $request->input('log2');/*получаем старый логин*/
 //       dump($log2);
        $user=new userModel();
        $user=userModel::select(['fam','im','ot','phone','log','pass','reg','token','date','position','id'])->where('log',$log2)->first(); /*ищем по старому логину*/
   //     dump($user);
        $user->fill($request->except('log2'));

     //   dump($user);
        try {
            $user->save();
        }
        catch (\Exception $e){
            echo $e->getMessage();
        }

        $articles=userModel::select(['fam','im','ot','log','date','position'])->get();

   //     dump($articles);

        return view('users-view')->with(['message'=>$this->message,
                'header'=>$this->header,
                'articles'=>$articles        ]
        );
     /*$user->fill($data->except('log2'));*/


    }

}
