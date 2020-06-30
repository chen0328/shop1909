<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MessagesModel;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function messages(Request $request){
        $code = $this->getImageCodeUrl($request);
//        var_dump($code);
        return view('index/liuyan',['code'=>$code]);
    }
    /**
     * 添加留言
     */
    public function addmessages(Request $request){
        $arr = $request->all();
        $data['msg_name']=$arr['msg_name'];
        $data['msg_content']=$arr['msg_content'];
        $data['addtime']=time();
        $code = $request->session()->get('code');
//        echo $code;exit;
        if($code != $arr['code']){
            return $this->message('00002','验证码错误','');
        }
        $res = MessagesModel::insert($data);
        if($res){
            return $this->message('00000','添加成功','');
        }else{
            return $this->message('00001','添加失败','');
        }
    }
    /**
     * 获取图片验证码的url
     * @param Request $request
     */
    public function getImageCodeUrl(Request $request){
        $request->session()->start();
        $sid = $request->session()->getId();
        $domain = str_replace(
            $request->path(),
            '',
            $request->url()
        );
        $image_code_url = $domain . 'imageCode?sid='.$sid;
        $api_return_arr = [
            'image_url'=>$image_code_url,
            'sid'=>$sid
        ];
        return $api_return_arr;
//        echo $sid;
//        echo $image_code_url;
//        exit;

    }
    public function imageCode( Request $request){
        // 设置session
//        session_start();
        // 设置验证码生成几位
        $num = 4;
        // 设置宽度
        $width = 100;
        // 设置高度
        $height = 30;
        //生成验证码，也可以用mt_rand(1000,9999)随机生成
        $Code = "";
        for ($i = 0; $i < $num; $i++) {
            $Code .= mt_rand(0,9);
        }

        // 将生成的验证码写入session
        $request->session()->put('code', $Code);
        $request->session()->save();

        // 设置头部
        header("Content-type: image/png");

        // 创建图像（宽度,高度）
        $img = imagecreate($width,$height);

        //创建颜色 （创建的图像，R，G，B）
        $GrayColor = imagecolorallocate($img,230,230,230);
        $BlackColor = imagecolorallocate($img, 0, 0, 0);
        $BrColor = imagecolorallocate($img,52,52,52);

        //填充背景（创建的图像，图像的坐标x，图像的坐标y，颜色值）
        imagefill($img,0,0,$GrayColor);

        //设置边框
        imagerectangle($img,0,0,$width-1,$height-1, $BrColor);

        //随机绘制两条虚线 五个黑色，五个淡灰色
        $style = array ($BlackColor,$BlackColor,$BlackColor,$BlackColor,$BlackColor,$GrayColor,$GrayColor,$GrayColor,$GrayColor,$GrayColor);
        imagesetstyle($img, $style);
        imageline($img,0,mt_rand(0,$height),$width,mt_rand(0,$height),IMG_COLOR_STYLED);
        imageline($img,0,mt_rand(0,$height),$width,mt_rand(0,$height),IMG_COLOR_STYLED);

        //随机生成干扰的点
        for ($i=0; $i < 200; $i++) {
            $PointColor = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$PointColor);
        }

        //将验证码随机显示
        for ($i = 0; $i < $num; $i++) {
            $x = ($i*$width/$num)+mt_rand(5,12);
            $y = mt_rand(5,10);
            imagestring($img,7,$x,$y,substr($Code,$i,1),$BlackColor);
        }

        //输出图像
        imagepng($img);
        //结束图像
        imagedestroy($img);
        exit;
    }
}
