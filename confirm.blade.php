<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link href="/assets/css/gift/initcss.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/gift/home.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.bootcss.com/layer/3.0.3/mobile/need/layer.min.css" rel="stylesheet">
    <title>确认订单</title>
    <style>
        .blackBg{position:fixed;left:0;top:0;width:100%;height:100%;z-index:999;background:rgba(0,0,0,0.5);}
        .fl{position:absolute;top:50%;left:50%;width: 40px;height: 40px;margin:-20px 0 0 -20px;}

        .container1 > div, .container2 > div, .container3 > div {width: 6px; height: 6px; background-color:#fff; border-radius: 100%; position: absolute;-webkit-animation: bouncedelay 1.2s infinite ease-in-out; animation: bouncedelay 1.2s infinite ease-in-out; -webkit-animation-fill-mode: both; animation-fill-mode: both;}

        .spinner2 .spinner-container { position: absolute; width: 100%; height: 100%;}

        .container2 { -webkit-transform: rotateZ(45deg); transform: rotateZ(45deg);}

        .circle1 { top: 0; left: 0; }
        .circle2 { top: 0; right: 0; }
        .circle3 { right: 0; bottom: 0; }
        .circle4 { left: 0; bottom: 0; }

        .container2 .circle1 { -webkit-animation-delay: -1.1s; animation-delay: -1.1s;}
        .container1 .circle2 { -webkit-animation-delay: -0.9s; animation-delay: -0.9s;}
        .container2 .circle2 { -webkit-animation-delay: -0.8s; animation-delay: -0.8s;}
        .container1 .circle3 { -webkit-animation-delay: -0.6s; animation-delay: -0.6s;}
        .container2 .circle3 { -webkit-animation-delay: -0.5s; animation-delay: -0.5s;}
        .container1 .circle4 { -webkit-animation-delay: -0.3s; animation-delay: -0.3s;}
        .container2 .circle4 { -webkit-animation-delay: -0.2s; animation-delay: -0.2s;}

        @-webkit-keyframes bouncedelay {
            0%, 80%, 100% { -webkit-transform: scale(0.0) }
            40% { -webkit-transform: scale(1.0) }
        }

        @keyframes bouncedelay {
            0%, 80%, 100% {transform: scale(0.0); -webkit-transform: scale(0.0);}
            40% { transform: scale(1.0); -webkit-transform: scale(1.0);}
        }
    </style>
</head>
<body>


<div class="page-all padding-bottom-70">
    <div class="aftersales-cell clearfix aftertime getgoodsDetails">
        <p class="p01">{{$list['receiver']}}&nbsp;&nbsp;&nbsp;&nbsp;{{$list['mobile']}}</p>
        <section class="section01"><i></i><p>{{$list['address']}}</p></section>
        {{--<span>(收货不便时，可选择免费代收货服务)</span>--}}
        <em></em>
    </div>
    {{--<div class="prize-num backg-col clearfix" style="margin-top: 10px;">--}}
    {{--<i class="receive_type"></i>门店代收--}}
    {{--</div>--}}
    <div class="aftersales-tcell clearfix aftersales-message">
        <div class="shop-state">
            <section><span>{{$list['store']['StoreName']}}</span><span></span></section>
        </div>
        @foreach($list['sku_order_goods'] as $item)
            <div class="commodity-box waitting-box countdown-box clearfix">
                <label class="commodity-img content-pic clearfix" style="width: 90px;">
                    @if(isset($item['goods_image']))
                        <img src="{{Config::get("gifts.IMG_URL")}}{{$item['goods_image']}}" alt="图片加载失败">
                        @if(!empty($promote_prj))
                            <img src="/assets/images/gift/lijian.png" style="position:absolute;right:2px;top:2px;width: 30px;height: 30px">
                        @endif
                    @else
                        <img src="/assets/images/gift/aaa.png" alt="图片加载失败">
                    @endif
                    @if($order_price==1)
                        <section>¥  @if(isset($item['goods_price']))
                                {{$item['goods_price']}}
                            @endif</section>
                    @endif
                </label>
                <p class="commodity-tit"> @if(isset($item['goods_name']))
                        {{$item['goods_name']}}
                    @endif</p>
                <div class="commodity-middle clearfix ">
                    @if($score_exchanged==1)
                        <span>@if(isset($item['goods_score'])) {{$item['goods_score']}} @endif积分/@if(isset($item['goods_ticket'])) {{$item['goods_ticket']}} @endif奖票</span>
                    @else
                        <span>@if(isset($item['goods_ticket'])) {{$item['goods_ticket']}} @endif奖票</span>
                    @endif
                    <span>x{{$item['goods_number']}}</span>
                </div>
            </div>
            @endforeach
                    <!--赠品-->
            {{--<div class="cart-give">--}}
            {{--<i></i>--}}
            {{--赠品    万房网女神绝版亲笔签名照--}}
            {{--<span>x1</span>--}}
            {{--</div>--}}
            <div class="shop-state border-bottom2">
                运费<span>+￥{{$list['freight']}}</span>
            </div>
            <div class="prize-num clearfix">
                <p>商品总额</p>
                <div>
                    @if($score_exchanged==1)
                        <span class="text-color">@if(isset($list['total_score'])){{$list['total_score']}}@endif积分
                        /@if(isset($list['total_ticket'])){{$list['total_ticket']}}@endif奖票</span>
                    @else
                        <span class="text-color">@if(isset($list['total_ticket'])){{$list['total_ticket']}}@endif奖票</span>
                    @endif

                    @if($order_price==1)
                        <section>价值￥@if(isset($list['total_amount']))
                                {{$list['total_amount']}}
                            @endif</section>
                    @endif

                </div>
            </div>
            <div id="youhuiticket" class="shop-state border-bottom2" style="display: none;">
                优惠

                <span id="yiyouhui" >0奖票</span>


            </div>
            <div id="shifu" class="shop-state border-bottom2" style="display: none;">
                实付

                <span id="shifuticket" >@if(isset($list['total_ticket'])){{$list['total_ticket']}}@endif奖票</span>


            </div>
    </div>
    @if($score_exchanged==1)
        <div class="public-cell"><em></em>支付方式选择(二选一)</div>
        <div class="prize-num backg-col clearfix" id="score" sta="2">
            <i class="pro_mas @if($pay_type == 1) addimg1 @endif"></i>积分
            <span class="order-yu">(余额{{$account['score']}}分)</span>
            <input class="order-yue" type="hidden" value="{{$account['score']}}" />
            <div class="order-yu-d">
                <input class="payrate" type="hidden" value="{{$payrate->score_value}}" />
                <input type="number" step="0.01" class="order-yu-inp" max="@if(isset($list['total_score'])){{$list['total_score']}}@endif" min="@if(isset($min['score'])){{$min['score']}}@endif" onblur="checkNum()" value="@if(isset($list['total_score']) && $list['total_score']< $account['score']){{$list['total_score']}}@else{{(int)$account['score']}}@endif" >
                <p>积分</p>
            </div>
            <p class="order-yu-tips">注：订单共需@if(isset($list['total_score'])){{$list['total_score']}}@endif积分，最少需要@if(isset($min['score'])){{$min['score']}}@endif积分</p>
            {{--<em></em>--}}
            {{--<span onclick="showinte()">--}}
            {{--<span class="use-number" style="float: left">@if(isset($min['score'])) {{$min['score']}} @endif</span>积分--}}
            {{--</span>--}}
        </div>
    @else
        <div class="public-cell"><em></em>支付方式</div>
    @endif
    <div class="prize-num backg-col clearfix" id="ticket" sta="1">
        <i class="pro_mas @if($pay_type == 2) addimg1 @endif"></i>奖票
        <span class="order-yu">(余额{{$account['tick_bal']}}票)</span>
        <input class="order-yue" type="hidden" value="{{$account['tick_bal']}}" />
        <div class="order-yu-d">
            <input class="payrate" type="hidden" value="{{$payrate->ticket_value}}" />
            <input type="number" step="0.01" class="order-yu-inp" max="@if(isset($list['total_ticket'])){{$list['total_ticket']}}@endif" min="@if(isset($min['ticket'])){{$min['ticket']}}@endif" onblur="checkNum()" value="@if(isset($list['total_ticket'])&& $list['total_ticket'] <$account['tick_bal']){{$list['total_ticket']}}@else{{(int)$account['tick_bal']}}@endif" >
            <p>奖票</p>

        </div>
        <p id ="tips" class="order-yu-tips">注：订单共需@if(isset($list['total_ticket'])){{$list['total_ticket']}}@endif奖票，最少需要@if(isset($min['ticket'])){{$min['ticket']}}@endif奖票</p></br>
        {{--<em></em>--}}
        {{--<span --}}{{--class="change-col"--}}{{-- onclick="showtick()">--}}
        {{--<span class="use-number" style="float: left">@if(isset($min['ticket'])){{$min['ticket']}}@endif</span>奖票--}}
        {{--</span>--}}


    </div>
    <div id="youhui" style="@if($pay_type == 1) display: none; @endif margin: 5px 0px;font-size: 15px;background-color: #FFFFFF;padding-left: 14px">
        <label  style="vertical-align:middle;line-height:30px"><input id="zero" checked="checked" min_amount=0  name="youhui" style="vertical-align:middle;width:20px;height:20px" type="radio"   value="0" qrcode="0"/>不使用优惠券</label></br>
        @foreach($tick_arr as $item)
            @if($item['promote']['tick_qty']!=0)
                <label class="youhui" style="vertical-align:middle;line-height:30px"><input  name="youhui" style="vertical-align:middle;width:20px;height:20px" type="radio"   value="{{$item['promote']['tick_qty']}}" qrcode="{{$item['qrcode']}}" min_amount="{{$item['promote']['min_amount']}}" prj_id="{{$item['promote_prj_id']}}" pt_sku="{{$item['pt_sku']}}"/>{{$item['promote']['tick_name']}}抵扣{{$item['promote']['tick_qty']}}奖票<span id="bumanzu" style="display:none">---不满足最低使用额</span></label></br>
            @endif
        @endforeach
    </div>
    <input class="" type="hidden" value="{{$account['discount']}}" />
</div>


<!--结算栏-->
<div class="mine-mess-box cart-order bottom-class clearfix">
    <div class="pay-num">实付款:￥
        <span id="realPayNum">@if(isset($list['paid_amount'])) {{$list['paid_amount']}} @endif</span>
    </div>
    <a class="cart-check" onclick="takeAll()">
        去结算<span class="all-number">({{$list['goods_num']}})</span>
    </a>
</div>

{{--<div class="delete-popup-box">--}}
{{--<div class="ticket-box tick-bgImg" sta="1">--}}
{{--<div class="tick-input">--}}
{{--<span>奖票：</span>--}}
{{--<input placeholder="订单共需@if(isset($list['total_ticket'])){{$list['total_ticket']}}@endif奖票" class="take-number">--}}
{{--</div>--}}

{{--<p>注意：兑换该订单至少需要<span class="max-number" max="@if(isset($list['total_ticket'])){{$list['total_ticket']}}@endif">@if(isset($min['ticket'])){{$min['ticket']}}@endif</span>奖票</p>--}}
{{--<section><a onclick="cancle()">取消</a><a onclick="checkNumber(this)">确定</a></section>--}}
{{--</div>--}}

{{--<div class="ticket-box inte-bgImg" sta="2">--}}
{{--<div class="tick-input">--}}
{{--<span>积分：</span>--}}
{{--<input placeholder="订单共需@if(isset($list['total_score'])){{$list['total_score']}}@endif积分" class="take-number">--}}
{{--</div>--}}

{{--<p>注意：兑换该订单至少需要<span class="max-number" max="@if(isset($list['total_score'])){{$list['total_score']}}@endif">@if(isset($min['score'])){{$min['score']}}@endif</span>积分</p>--}}
{{--<section><a onclick="cancle()">取消</a><a onclick="checkNumber(this)">确定</a></section>--}}
{{--</div>--}}
{{--</div>--}}
</body>
<script src="/assets/js/jquery-1.12.3.min.js"></script>
<script src="https://cdn.bootcss.com/layer/3.0.3/mobile/layer.js"></script>
<script>

    $(document).ready(function(){
        $('.pro_mas').trigger("click");
        $('label input').trigger("click");

        var pay_type = {{$pay_type}};
        if(pay_type==2){
            $('.pro_mas').click();
        }


        $("label input").click(function() {

            var payrate = $('.addimg1').parent(".prize-num").find(".payrate").val();   //被除数
            var num = $('.addimg1').parent(".prize-num").find(".order-yu-inp").val();     //点前输入值
            var yu =  $('.addimg1').parent(".prize-num").find(".order-yue").val();   //当前用户剩余积分
            var payrate = $('.addimg1').parent(".prize-num").find(".payrate").val();   //被除数
            var youhui = $('input:radio[name="youhui"]:checked').val();
            var percent = <?php echo $min['ticket']/$list['total_ticket']; ?> ;
            var max = <?php echo $list['total_ticket']; ?>;
            var min =  <?php echo $min['ticket']?>;

            if(yu - num < 0){

                t = 2;
                $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(parseInt(yu));
                num=parseInt(yu)-youhui;
            }

            if(num - max > 0){
                t = 2;
                $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(parseInt(max));
                num=parseInt(max)-youhui;
            }

            if(num - min <0){
                t = 2;
                $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(parseInt(min));
                num=parseInt(min)-youhui;
            }

            var shifuticket = <?php echo $list['total_ticket']; ?>-youhui;
            if(shifuticket<0){
                shifuticket = 0;
            }
            $('#shifuticket').text(shifuticket+'奖票');
            $('#yiyouhui').text(youhui+'奖票');

            // var max = $('.addimg1').parent(".prize-num").find(".order-yu-inp").attr('max',shifuticket);  //最大使用值
            var min = $('.addimg1').parent(".prize-num").find(".order-yu-inp").attr('min',Math.round(shifuticket*percent));  //最小使用值
            // var num = $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(shifuticket);     //点前输入值
            $('#tips').html('注：订单共需'+shifuticket+'奖票，最少需要'+Math.round(shifuticket*percent)+'奖票');
            // checkNum();

            var amount = (max-shifuticket-youhui)/payrate;
            $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(shifuticket);
            console.log('max'+max);
            console.log('num'+num);
            console.log('youhui'+youhui);
            console.log('shifuticket'+shifuticket);
            console.log(amount);
            if(amount<=0){
                var amount = 0;
            }
            var amount =  amount.toFixed(2);

            //818-hyl-修改前端计算数据-开始--------------------
            if(amount==0){
                $('.pay-num').html('实付奖票:<span id="realPayNum">'+shifuticket+'</span>');
            }else{
                $('.pay-num span').html(amount);
            }

            //set_quan();
            var quan = $('.youhui input');
            var num = $('.addimg1').parent(".prize-num").find(".order-yu-inp").val();     //点前输入值
            $.each(quan, function(index, item){
                var quan1 = $(item).attr('min_amount');
                console.log('quan111',quan1);
                console.log('num22',num);
                if(quan1-num > 0){


                    $(item).attr("disabled", 'disabled');
                    // $(item).parent('label').append('<span id="bumanzu" style="display:none">---不满足最低使用额</span>');
                    // $('#bumanzu').css('display','block');
                    $(item).removeAttr("checked");
                    //  console.log('youhui1',youhui1);
                    a=1;
                }else{
                    $(item).removeAttr("disabled");
                    // $(item).attr("checked",true);
                    // $(item).parent('label').append('---<span>不满足最低使用额</span>');
                    // $('#bumanzu').css('display','none');
                    b=2;
                }

            });
        });

        var quan = $('.youhui input');
        $('label input').trigger("click");
        $.each(quan, function(index, item){
            var quan1 = $(item).attr('value');
            $.each(quan, function(index1, item1){
                var quan2 = $(item1).attr('value');
//                console.log('maxvalquan1'+quan1);
//                console.log('maxvalquan2'+quan2);
                if(quan1-quan2>0){

                    var maxvalue = quan1;
                    console.log('maxval'+maxvalue);
                    $(item).trigger("click");
                }

//                if(!maxvalue){
//                    console.log('maxval'+maxvalue);
//                    $(item).trigger("click");
//                }
                if(quan.length<=1){
                    console.log('111111111');
                    $(item).trigger("click");
                }
            });

        });


    });
    var t = 1;
    $('.addimg1').parent(".prize-num").find(".order-yu-d,.order-yu-tips").show();





    $('.pro_mas').click(function(){

        var max = $(this).parent(".prize-num").find(".order-yu-inp").attr("max");  //最大使用值
        var min = $(this).parent(".prize-num").find(".order-yu-inp").attr("min");  //最小使用值
        var num = $(this).parent(".prize-num").find(".order-yu-inp").val();     	//点前输入值
        var yu =  $(this).parent(".prize-num").find(".order-yue").val();   			//当前用户剩余积分
        var payrate = $(this).parent(".prize-num").find(".payrate").val();   		//被除数
        var youhui = $('input:radio[name="youhui"]:checked').val();

        console.log("切换最大使用值:"+max);
        console.log("切换最小使用值:"+min);
        console.log("切换点前输入值:"+num);
        console.log("切换当前用户剩余积分:"+yu);
        console.log("切换被除数:"+payrate);
        console.log("tttt:"+t);

        var order_id = '{{$list['order_id']}}';

        var score_count={{$account['score']}};

        var tick_count={{$account['tick_bal']}};

        var score = '';

        var ticket = '';

        if($(this).parents(".prize-num").attr("sta") == '1'){
            $("#youhui").show();
            $("#shifu").show();
            $("#youhuiticket").show();
            url = '/pay/is_ticket';

            ticket = $(this).parents(".prize-num").find(".order-yu-inp").val();

            console.log(tick_count-min)

            if(tick_count-min<0){
                $("#youhui").hide();
                $("#shifu").hide();
                $("#youhuiticket").hide();
                //alert("你奖票小于最小需要奖票数");
                layer.open({
                    content: '你奖票小于最小需要奖票数!!'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                return ;}

            t = 1;

        }else{
            $("#youhui").hide();
            $("#shifu").hide();
            $("#youhuiticket").hide();
            url = '/pay/is_score';

            score = $(this).parents(".prize-num").find(".order-yu-inp").val();
            console.log(score_count);
            console.log(min);
            if(score_count-min<0){
                //alert("你积分小于最小需要积分数");
                layer.open({
                    content: '你积分小于最小需要积分数!!'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                return ;
            }

            t = 2;
        }


        var quan = $('.youhui input');

        $.each(quan, function(index, item){
            var quan1 = $(item).attr('min_amount');
            console.log('quan1',quan1);
            console.log('num',num);
            if(quan1-num > 0){


                $(item).attr("disabled", 'disabled');
                // $(item).parent('label').append('<span id="bumanzu" style="display:none">---不满足最低使用额</span>');
                // $('#bumanzu').css('display','block');
                $(item).removeAttr("checked");
                //  console.log('youhui1',youhui1);
                a=1;
            }else{
                $(item).removeAttr("disabled");
                // $(item).attr("checked",true);
                // $(item).parent('label').append('---<span>不满足最低使用额</span>');
                // $('#bumanzu').css('display','none');
                b=2;
            }

        });


        //alert(ticket);
        $('.pro_mas').removeClass('addimg1');
        if(t == 1){
            k=1;
            $('#ticket .pro_mas').addClass("addimg1");
            $('#ticket .order-yu-d,#ticket .order-yu-tips').show();
            $('#score .order-yu-d,#score .order-yu-tips').hide();
            //checkNum();
            var amount = (max-num-youhui)/payrate;
            if(amount<=0){
                var amount = 0;
            }
            var amount =  amount.toFixed(2);
            console.log('youhui',youhui);
            console.log('amount',amount);
            //818-hyl-修改前端计算数据-开始--------------------
            if(amount==0){
                $('.pay-num').html('实付奖票:<span id="realPayNum">'+max+'</span>');
            }else{
                $('.pay-num').html('实付款￥:<span id="realPayNum">'+amount+'</span>');
            }
            // $('.pay-num span').html(amount);
            t=1;
        }else{
            k=2;
            $('#score .pro_mas').addClass("addimg1");
            $('#score .order-yu-d,#score .order-yu-tips').show();
            $('#ticket .order-yu-d,#ticket .order-yu-tips').hide();
            //checkNum();
            var amount = (max-num)/payrate;
            if(amount<=0){
                var amount = 0;
            }
            var amount =  amount.toFixed(2);
            console.log(amount);
            //818-hyl-修改前端计算数据-开始--------------------
            if(amount==0){
                $('.pay-num').html('实付积分:<span id="realPayNum">'+max+'</span>');
            }else{
                $('.pay-num').html('实付款￥:<span id="realPayNum">'+amount+'</span>');
            }
            //  $('.pay-num span').html(amount);
            t=1;
        }




    })



    //    收货方式=====
    $('.receive_type').click(function(){
        if($(this).hasClass("addimg1")){
            $(this).removeClass("addimg1");
        }else{
            $(this).addClass('addimg1');
        }
    });

    //    结算=======
    var canpay = true;
    function takeAll(){
        //loading(true);
        //是否支付
        var check=confirm('是否确定支付？');
        if(check){
            if(canpay){   //判断订单是否可支付
                canpay = false;
                openlayer = layer.open({type: 2});
//          alert(666);
//        	checkNum();
                console.log(t);
                if(t == 1){
                    // alert(1111);
                    var receive_type = 0;
                    if($('.receive_type').hasClass("addimg1")){
                        receive_type = 1;
                    }
                    var pay_type = 1;
                    var score = 0;
                    var ticket = 0;
                    var youhui = 0;
                    var qrcode = 0;
                    var prj_id = 0;
                    var pt_prj_id = 0;
                    var pt_sku = 0;
                    if($('#score').find(".pro_mas").hasClass("addimg1")){
                        pay_type = 1;
                        score = $('#score').find(".order-yu-inp").val();
                        ticket = 0;
                    }else{
                        pay_type = 2;
                        ticket = $('#ticket').find(".order-yu-inp").val();
                        score = 0;
                        youhui = $('input:radio[name="youhui"]:checked').val();
                        qrcode = $('input:radio[name="youhui"]:checked').attr('qrcode');
                        prj_id = $('input:radio[name="youhui"]:checked').attr('prj_id');
                        pt_prj_id = $('input:radio[name="youhui"]:checked').attr('pt_prj_id');
                        pt_sku = $('input:radio[name="youhui"]:checked').attr('pt_sku');
                    }

                    var order_id = '{{$list['order_id']}}';
                    var url = '/pay/order_prev_pay';
                    $.ajax(url,{
                        type:'post',
                        data:{receive_type:receive_type,pay_type:pay_type,score:score,ticket:ticket,order_id:order_id,youhui:youhui,qrcode:qrcode,prj_id:prj_id,pt_prj_id:pt_prj_id,pt_sku:pt_sku},
                        dataType:'json',
                        success: function(data){
                            //loading(false);
                            canpay = true;
                            layer.close(openlayer);

                            if(typeof(data.info)!="undefined"){
                                if(data.status==0){
                                    alert(data.info);
                                    window.location.href='/order/list?type=2';
                                }else if(data.status==2001456){
                                    alert(data.info);
                                    window.location.href='/order/list?type=1';
                                }else{
                                    //loading(false);
                                    layer.close(openlayer);
                                    alert(data.info);
                                    window.location.href='/order/list';
                                }
                            }
                            if (typeof WeixinJSBridge == "undefined"){    //需要调用微信支付


                                if( document.addEventListener ){
                                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                                }else if (document.attachEvent){
                                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                                }
                            }else{
                                ;
                                jsApiCall(data);
                            }


                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            console.log('XMLHttpRequest',XMLHttpRequest);
                            console.log('textStatus',textStatus);
                            console.log('errorThrown',errorThrown);
                        }
                    })
                }else{

                    loading(false);

                }
            }else{

                layer.open({
                    content: '您的订单正在支付中,请稍等'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
            }
        }else{
            window.location.href = "/order/list";
        }





    }


    //    检测输入积分，奖票=======
    function checkNum(){
        var max = $('.addimg1').parent(".prize-num").find(".order-yu-inp").attr("max");  //最大使用值
        //var max = <?php echo $list['total_ticket'] ?>;
        var min = $('.addimg1').parent(".prize-num").find(".order-yu-inp").attr("min");  //最小使用值
        //  var min = <?php echo $min['ticket'] ?>;
        var num = $('.addimg1').parent(".prize-num").find(".order-yu-inp").val();     //点前输入值
        var yu =  $('.addimg1').parent(".prize-num").find(".order-yue").val();   //当前用户剩余积分
        var payrate = $('.addimg1').parent(".prize-num").find(".payrate").val();   //被除数

        //console.log('优惠:'+youhui);
        console.log("最大使用值:"+max);
        console.log("最小使用值:"+min);
        console.log("点前输入值:"+num);
        console.log("当前用户剩余积分:"+yu);
        console.log("被除数:"+payrate);
        console.log("类型:"+k);

        if(yu - num < 0){

            t = 2;
            $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(parseInt(yu));
            num=parseInt(yu);
        }

        if(num - max > 0){
            t = 2;
            $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(parseInt(max));
            num=parseInt(max);
        }

        if(num - min <0){
            t = 2;
            // console.log(111);
            $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(parseInt(min));
            num=parseInt(min);
        }


//            max = parseInt(max).toFixed(2);
//            num = parseInt(num).toFixed(2);
//隐藏不符合支付数的优惠券

        var quan = $('.youhui input');
        var a=0;
        var b=0;
        $.each(quan, function(index, item){
            var quan1 = $(item).attr('min_amount');


            if(quan1-num>0){
                //  alert(111);
//alert( $(item).is(":checked"));
                $(item).attr("disabled", 'disabled');
                // $(item).parent('label').append('<span id="bumanzu" style="display:none">---不满足最低使用额</span>');
                // $('#bumanzu').css('display','block');
                if( $(item).is(":checked")){
                    $(item).removeAttr("checked");
                    $('#zero').prop('checked',true);
                    num = <?php echo $list['total_ticket'] ?>

                }

                //  console.log('youhui1',youhui1);
                a=1;
            }else{
                $(item).removeAttr("disabled");
                //  $(item).attr("checked",true);
                // $(item).parent('label').append('---<span>不满足最低使用额</span>');
                // $('#bumanzu').css('display','none');
                b=2;
            }

        });

        //set_quan();
        var youhui = $('input:radio[name="youhui"]:checked').val();
        var shifuticket = <?php echo $list['total_ticket'] ?>-youhui;
        $('#shifuticket').text(shifuticket+'奖票');
        $('#yiyouhui').text(youhui+'奖票');
        var percent = <?php echo $min['ticket']/$list['total_ticket']; ?> ;
        $('#tips').html('注：订单共需'+shifuticket+'奖票，最少需要'+Math.round(shifuticket*percent)+'奖票');
        //console.log('quan',quan[0]);
        console.log('youhui111',youhui);
        console.log('shifuticket',shifuticket);
        console.log('max',max);
        console.log('num',num);
        // $('.addimg1').parent(".prize-num").find(".order-yu-inp").val(shifuticket);


        {{--if(a==1 && b==0){--}}
        {{--$('#zero').prop('checked','checked');--}}
        {{--$('.addimg1').parent(".prize-num").find(".order-yu-inp").val({{$min['ticket']}});--}}
        {{--var num = $('.addimg1').parent(".prize-num").find(".order-yu-inp").val();     //点前输入值--}}
        {{--var youhui = $('input:radio[name="youhui"]:checked').val();--}}
        // //////{{--var shifuticket = <?php echo $list['total_ticket'] ?>-youhui;--}}
        {{--$('#shifuticket').text(shifuticket+'奖票');--}}
        {{--$('#yiyouhui').text(youhui+'奖票');--}}
        ///////  {{--var percent = <?php echo $min['ticket']/$list['total_ticket']; ?> ;--}}
        {{--$('#tips').html('注：订单共需'+shifuticket+'奖票，最少需要'+Math.round(shifuticket*percent)+'奖票');--}}
        {{--$.each(quan, function(index, item){--}}
        {{--var quan1 = $(item).attr('min_amount');--}}
        {{--if(quan1>num){--}}


        {{--$(item).attr("disabled", 'disabled');--}}
        {{--// $(item).parent('label').append('<span id="bumanzu" style="display:none">---不满足最低使用额</span>');--}}
        {{--// $('#bumanzu').css('display','block');--}}
        {{--$(item).removeAttr("checked");--}}
        {{--//  console.log('youhui1',youhui1);--}}
        {{--a=1;--}}
        {{--}else{--}}
        {{--$(item).removeAttr("disabled");--}}
        {{--$(item).attr("checked",true);--}}
        {{--// $(item).parent('label').append('---<span>不满足最低使用额</span>');--}}
        {{--// $('#bumanzu').css('display','none');--}}
        {{--b=2;--}}
        {{--}--}}

        {{--});--}}
        {{--}--}}
        if(k==1){
            var amount = (max-num-youhui)/payrate;
        }else{
            var amount = (max-num)/payrate;
        }

        if(amount<=0){
            var amount = 0;
        }
        var amount =  amount.toFixed(2);
        console.log(amount);
        //818-hyl-修改前端计算数据-开始--------------------
        if(amount==0){
            if(k==1){
                $('.pay-num').html('实付奖票:<span id="realPayNum">'+max+'</span>');
            }else{
                $('.pay-num').html('实付积分:<span id="realPayNum">'+max+'</span>');
            }

        }else{
            $('.pay-num').html('实付款￥:<span id="realPayNum">'+amount+'</span>');
        }
        //  $('.pay-num span').html(amount);

        t = 1;
        //}
//        setTimeout("t = 1",100);

    }
    function set_quan(){
        //$('#zero').prop('checked','checked');
        //var max = $('.addimg1').parent(".prize-num").find(".order-yu-inp").attr("max");  //最大使用值
        var quan = $('.youhui input');

        $.each(quan, function(index, item){
            var quan1 = $(item).attr('min_amount');
            if(quan1>num){


                $(item).attr("disabled", 'disabled');
                // $(item).parent('label').append('<span id="bumanzu" style="display:none">---不满足最低使用额</span>');
                // $('#bumanzu').css('display','block');
                $(item).removeAttr("checked");
                //  console.log('youhui1',youhui1);
                var a=1;
            }else{
                $(item).removeAttr("disabled");
                $(item).attr("checked",true);
                // $(item).parent('label').append('---<span>不满足最低使用额</span>');
                // $('#bumanzu').css('display','none');
                var a=2;
            }
            if(a=2){
                $('#zero').prop('checked','checked');
                $('.addimg1').parent(".prize-num").find(".order-yu-inp").val({{$min['ticket']}});
            }
        });

    }
    function takeData(){
        var url = '';
        var order_id = '{{$list['order_id']}}';
        var score = '';
        var ticket = '';
        var t = 0;
        var num = $('.addimg1').parent(".prize-num").find(".order-yu-inp").val();
        if($('.addimg1').parent(".prize-num").attr("id") == 'ticket'){
            url = '/pay/is_ticket';
            ticket = num;
            t = 1;
        }else{
            url = '/pay/is_score';
            score = num;
            t = 2;
        }
        $.ajax(url,{
            type:'post',
            data:{ticket:ticket,score:score,order_id:order_id},
            dataType:'json',
            success: function(data){
                if(data.status == 0){
                    $('.pay-num span').html(data.amount);
                }else{
                    alert(data.info);
                    location.reload();
                    return;
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('XMLHttpRequest',XMLHttpRequest);
                console.log('textStatus',textStatus);
                console.log('errorThrown',errorThrown);
            }
        })
    }
    window.alert = function(name){
        var iframe = document.createElement("IFRAME");
        iframe.style.display="none";
        iframe.setAttribute("src", 'data:text/plain,');
        document.documentElement.appendChild(iframe);
        window.frames[0].window.alert(name);
        iframe.parentNode.removeChild(iframe);
    };
    window.confirm = function (message) {
        var iframe = document.createElement("IFRAME");
        iframe.style.display = "none";
        iframe.setAttribute("src", 'data:text/plain,');
        document.documentElement.appendChild(iframe);
        var alertFrame = window.frames[0];
        var result = alertFrame.window.confirm(message);
        iframe.parentNode.removeChild(iframe);
        return result;
    };


    function jsApiCall(str)
    {
        WeixinJSBridge.invoke('getBrandWCPayRequest',JSON.parse(str.pay.code),
                function(res)
                {
                    WeixinJSBridge.log(res.err_msg);
                    //alert(res.err_code+res.err_desc+res.err_msg);
                    // if(res.err_msg == "get_brand_wcpay_request:ok" )
                    //{
                    //     window.location.href='/order/list?type=2';
                    // }
                    if(res.err_msg == "get_brand_wcpay_request:cancel"||res.err_msg == "get_brand_wcpay_request:fail" ){   //微信支付失败或取消
                        url="/wechat_return";
                        var order_id=str.orderid;
                        $.post(url,{'order_id':order_id},function(data){
                            alert(data.info);
                            window.location.href='/order/list';

                        });
                    }else{
                        window.location.href='/order/list';
                    }
                }
        );
    }

    //-------------------------↓-Loading-↓-----------------------
    function loading(isShow){
        if(isShow){
            $("body").append('<div class="blackBg" id="loading"><div class="fl spinner2" id="ldImg"><div class="spinner-container container1"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container2"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div><div class="spinner-container container3"><div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div></div></div></div>');
        }else{
            $("#loading").remove();
        }
    }
    //-------------------------↑-Loading-↑-----------------------

    //限制键盘只能按数字键、小键盘数字键、退格键
    $(".order-yu-inp,.order-yu-inp").keydown(function (e) {
        var code = parseInt(e.keyCode);
        console.log(e);
        if (code >= 96 && code <= 105 || code >= 48 && code <= 57 || code == 8 || code == 110 || code == 190) {
            return true;
        } else {
            return false;
        }
    });

    //文本框输入事件,任何非正整数的输入都重置为1
    $(".order-yu-inp,.order-yu-inp").bind("input propertychange", function () {
        if (isNaN(parseFloat($(this).val())) || parseFloat($(this).val()) <= 0) $(this).val("");
    })
</script>
</html>
