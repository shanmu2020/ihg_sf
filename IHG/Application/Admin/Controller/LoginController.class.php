<?php
namespace Admin\Controller;
use Think\Controller;use Tkink\Model;
class LoginController extends Controller{
    public function index(){
        if(!empty(session('username'))){
            $this->success('你已经登陆过',U('admin/index/index'),2);
                               }
                               $this->display('login/index');
                           }

    public function logincheck(){

//         $username="king";$password=123123;

        $username = $_POST['username'];
        $password = $_POST['password'];
        $monthlogin=$_POST['monthlogin'];
//         dump($monthlogin);exit;
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }
        if(!trim($password)) {
            return show(0,'密码不能为空');
        }

        $ret = D('Admin')->getAdminByUsername($username);
        if(!$ret['username']) {
            return show(0,'该用户不存在');
        }



//         D("Admin")->updateByAdminId($ret['admin_id'],array('lastlogintime'=>time()));
if ($ret['password'] == $password){
    if($monthlogin==1)
{cookie('username',$ret['username'],60*60*24*30);

}
    else{session('username', $ret['username']);}
        return show(1,'登录成功');}
        else{ return show(0,'密码错误');}



//                                var_dump($login);
    }

public function loginout(){
    session('username',null);
    $this->success('退出成功',U('admin/login/index'));
//     $this->redirect(U('admin/login/index'));
}




 //over
    }