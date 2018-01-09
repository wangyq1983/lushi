$(function(){
    /*卡牌名称*/
    function kp_name_position(){
        $(".kpname").empty();
        kp_val_size=kp_val.length;//获取名称长度
        //kp_china_name=kp_val.match(/[^\x00-\xff]/g);
        var kp_name_array=new Array();
        kp_name_array.splice(0,kp_name_array.length);
        kp_name_array=kp_val.split("");//字符串转数组
        var kp_span="<span></span>";
        var kp_name_length=kp_name_array.length;
        var base_number=Math.ceil(kp_name_length/2-1);//字符串中间位置序号
        for(var i=0;i<kp_val_size;i++){
            $(".kpname").append("<span></span>");
            var kpspan=$(".kpname span").eq(i).append(kp_name_array[i]);
        }

        $(".kpname span").eq(base_number).addClass("name_f5");
        $(".kpname span").eq(base_number+1).addClass("name_f6");
        $(".kpname span").eq(base_number-1).addClass("name_f4");
        $(".kpname span").eq(base_number+2).addClass("name_f7");
        $(".kpname span").eq(base_number-2).addClass("name_f3");
        $(".kpname span").eq(base_number+3).addClass("name_f8");
        $(".kpname span").eq(base_number-3).addClass("name_f2");
        $(".kpname span").eq(base_number+4).addClass("name_f9");
        $(".kpname span").eq(base_number-4).addClass("name_f1");
    }
    $(".name_ok").on("click",function(){
        kp_val=$("#kp_name").val();
        //$(".kpname").text(kp_val);
        kp_name_position();
    });
    //卡牌品质
    img_chuangyi();
    $(".c_b input[type='radio']").on("click",function(){
        img_chuangyi();
    });

    function img_chuangyi(){
        switch($("input[name=pzfl]:checked").attr("value")){
            case "putong":
                $(".kppz").empty();
                var pupz="<img src='images/jn1.png' />";
                $(".kppz").append(pupz);
                break;
            case "xiyou":
                $(".kppz").empty();
                var pupz="<img src='images/jn2.png' />";
                $(".kppz").append(pupz);
                break;
            case "shishi":
                $(".kppz").empty();
                var pupz="<img src='images/jn3.png' />";
                $(".kppz").append(pupz);
                break;
            case "chuanshuo":
                $(".kppz").empty();
                var pupz="<img src='images/jn4.png' />";
                $(".kppz").append(pupz);
                break;
            default:
                break;
        }
    }


    //卡牌属性

    $(".kpinfo_text").on("keyup",function(){
        var kp_info=$(this).val();
        $(".kp_info").text(kp_info);
    });

    //种族属性
    $(".zhongzu").on("keyup",function(){
        var zz_val=$(this).val();
        if(zz_val.length>0){
            $(".pt_suicong").css("background","url('images/putong/pt_suicong.png') no-repeat");
            $(".zhongzu_title").text(zz_val);
        }
        else{
            $(".pt_suicong").css("background","url('images/putong/pt_suicong_nozz.png') no-repeat");
            $(".zhongzu_title").empty();
        }
    });
    //图片路径
    $(".img_list ul li").on("click",function(){
        var img_base_path=$(this).find("img").attr("src");
        $(".touxiang img").attr("src",img_base_path);
        var imgpath=$(".touxiang img").attr("src");
        $(".img_path1").val(imgpath);
    });

    /*法力消耗数值*/
    $(".fali input").on("keyup",function(){
        var fali_val=$(this).val();
        $(".kpfali").text(fali_val);
    });
    /*生命数值*/
    $(".hp input").on("keyup",function(){
        var hp_val=$(this).val();
        $(".kphp").text(hp_val);
    });
    /*伤害数值*/
    $(".sh input").on("keyup",function(){
        var sh_val=$(this).val();
        $(".kpsh").text(sh_val );
    });



});