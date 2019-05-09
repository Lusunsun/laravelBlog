function connected(push_ws) {
    // var times =sessionStorage.getItem('websockets');
    // if(times<1) {
    var connect = new WebSocket(push_ws);
    connect.onopen = function () {
        connect.send(JSON.stringify({type: "loging"}));
    }
    connect.onmessage = function (data) {
        var msg = eval("(" + data.data + ")");
        var type = msg.type || "";
        switch (type) {
            case 'init':
                var client_id = msg.client_id;
                $.ajax({
                    url: "bindUid?client_id=" + client_id,
                    dataType: "json",
                    success: function (e) {
                        if (e.status == 1) {
                            var uid = e.uid;
                            var role = e.role;
                            //通知websocket 检验是否需要弹窗提醒
                            connect.send(JSON.stringify({type: "search", uid: uid,role: role}));
                            // sessionStorage.setItem('websockets',1);
                        }
                    }
                })
                break;
            case 'alert':
                if (typeof notifys == "undefined") {
                    notifys = new PNotify({
                        addclass: "stack-bottomright",
                        title: "推广池客户通知",
                        text: msg.message,
                        type: "success",
                        delay:8000,
                        hide:true, //是否自动关闭
                        confirm: {
                            confirm: true,
                            buttons: [{
                                text: '知道了',
                                click: function (notice) {
                                    $.ajax({
                                        url: "remove_notify/1",
                                        dataType: "json",
                                        // data:{type:1},
                                        success: function () {

                                        }
                                    })
                                    delete notifys;
                                    notice.remove();
                                }
                            },
                                null]
                        },
                        buttons: {
                            // closer_hover: false,
                            closer:false,
                            sticker: false
                        },
                        history: {
                            history: false
                        }
                    });
                    break;
                }
                break;
            case 'company_alert':
                if (typeof notifys_alert == "undefined") {
                    notifys_alert = new PNotify({
                        addclass: "stack-bottomright",
                        title: "推广池客户通知",
                        text: msg.message,
                        type: "notice",
                        hide: false,
                        confirm: {
                            confirm: true,
                            buttons: [{
                                text: '知道了',
                                click: function (notice) {
                                    $.ajax({
                                        url: "remove_notify/2",
                                        dataType: "json",
                                        // data: {type: 2},
                                        success: function () {

                                        }
                                    })
                                    delete notifys_alert;
                                    notice.remove();
                                }
                            },
                                null]
                        },
                        buttons: {
                            // closer_hover: false,
                            closer: false,
                            sticker: false
                        },
                        history: {
                            history: false
                        }
                    });
                    break;
                }
                break;
            case 'notify':
                new PNotify({
                    addclass: "stack-bottomright",
                    title: "消息提醒",
                    text: msg.message,
                    type: "success",
                    hide:false, //是否自动关闭
                    confirm: {
                        confirm: true,
                        buttons: [{
                            text: '知道了',
                            click: function (notice) {
                                notice.remove();
                            }
                        },
                            null]
                    },
                    buttons: {
                        closer_hover: false,
                        // closer:false,
                        sticker: false
                    },
                    history: {
                        history: false
                    }
                });
                break;
            case 'send_notice':
                $.get("get_notice_info?id=" + msg.message,function(data){
                    var data = eval("("+data+")");
                    if(data.type == 5){
                        $(".news-pulloutblue").find('.news-pulloutblue-container-content').html(data.send_content_html);
                        $(".news-pulloutblue").find('.news-pulloutblue-title>p').html(data.send_title);
                        $(".news-pulloutblue").find('.publisher_blue').text(data.publisher + '宣');
                        $(".news-pulloutblue").find('.release_time_blue').text(data.create_time);
                        var t=new TimelineMax();    
                        t.to(".news-pulloutblue",0,{
                            visibility:"visible",
                            opacity:1,
                            display:"block"
                        },0.2);
                        t.to(".news-pulloutblue-box",0.2,{
                            top:"100px"
                        },0.2);
                        t.to(".news-pulloutblue-box-content",0,{
                            width:"0px",
                            minHeight:"0px"
                        },0.2);
                        t.to(".news-pulloutblue-box-content",0,{
                            width:"20px",
                            minHeight:"20px"
                        },0.2);
                        t.to(".news-pulloutblue-box-content",0.1,{
                            width:"20px",
                            minHeight:"20px"
                        },0.3);
                        t.to(".news-pulloutblue-box-content",0.4,{
                            width:"845px",
                            minHeight:"511px"
                        },0.4);
                        t.to(".news-pulloutblue-title",0.3,{
                            display:"block",
                            opacity: 1,
                            visibility: "visible"
                        },0.8);
                        t.to(".news-pulloutblue-container",0.3,{
                            display:"block",
                            opacity: 1,
                            visibility: "visible"
                        },0.8);    
                        t.to(".news-pulloutblue-bottom",0,{
                            display:"block",
                            opacity: 1,
                            visibility: "visible"
                        },0.8);     
                        t.play();
                        var times = 10;
                        timer=setInterval(function(){
                            if(times > 0){
                                $(".news-pulloutblue").find('.news-pulloutblue-close-timing').text(times);
                                times--;
                            }else if(times<=0){
                                clearInterval(timer);
                                $(".news-pulloutblue").find('.news-pulloutblue-close-timing').text('');
                                $(".news-pulloutblue").find('.news-pulloutblue-close-timing').addClass('news-pulloutblue-close');
                            }
                        },1000);
                        $(document).on("click",".news-pulloutblue-close",function(){
                            $(".news-pulloutblue").find('.news-pulloutblue-close-timing').removeClass('news-pulloutblue-close');
                            t.reverse();
                        })
                    }else{
                        $(".news-pullout").find('h1').text(data.send_title);
                        $(".news-pullout").find('.news-pullout-container p').text(data.file);
                        $(".news-pullout").find('.news-pt').html(data.send_content_html);
                        $(".news-pullout").find('.title_red').text('主题/Re:' + data.send_title);
                        $(".news-pullout").find('.publisher').text(data.publisher + '宣');
                        $(".news-pullout").find('.release_time').text(data.create_time);
                        var t=new TimelineMax();    
                        t.to(".news-pullout",0,{
                            visibility:"visible",
                            opacity:1,
                            display:"block"
                        },0.2);
                        t.to(".news-pullout-box",0.2,{
                            top:"100px"
                        },0.2);
                        t.to(".news-pullout-box-content",0,{
                            width:"0px",
                            minHeight:"0px"
                        },0.2);
                        t.to(".news-pullout-box-content",0,{
                            width:"20px",
                            minHeight:"20px"
                        },0.2);
                        t.to(".news-pullout-box-content",0.4,{
                            width:"845px",
                            minHeight:"570px"
                        },0.4);
                        t.to(".news-pullout-top",0.3,{
                            display:"block",
                            opacity: 1,
                            visibility: "visible"
                        },0.8);
                        t.to(".news-pullout-container-title",0.3,{
                            display:"block",
                            opacity: 1,
                            visibility: "visible"
                        },0.8);
                        t.to(".news-pullout-container-content",0.3,{
                            display:"block",
                            opacity: 1,
                            visibility: "visible"
                        },0.8);
                        t.to(".news-pullout-bottom",0.3,{
                            display:"block",
                            opacity: 1,
                            visibility: "visible"
                        },0.8);        

                        t.play();

                        var times = 10;
                        timer=setInterval(function(){
                            if(times > 0){
                                $(".news-pullout").find('.news-pullout-close-timing').text(times);
                                times--;
                            }else if(times<=0){
                                clearInterval(timer);
                                $(".news-pullout").find('.news-pullout-close-timing').text('');
                                $(".news-pullout").find('.news-pullout-close-timing').addClass('news-pullout-close');
                            }
                        },1000);
                        $(document).on("click",".news-pullout-close",function(){
                            $(".news-pullout").find('.news-pullout-close-timing').removeClass('news-pullout-close');
                            t.reverse();
                        })
                    }
                });
                break;
            case 'call_remind' :
                $.get("get_call_remind?time=" + msg.message,function(data){
                    if(data.not_achieve > 0){
                        $(".warning-pull").find('.warning-closes').removeClass('warning-close');
                        if(data.role == 18){
                            $(".warning-pull").find('.warning-pull-p').html("截止今日"+ data.time +",本中心共有<span class='fontBold'>"+ data.not_achieve +"</span>人有效通话低于<span class='fontBold'>"+ data.call_well +"</span>通,未达公司最低标准,请及时跟进处理！");
                        }else if(data.role == 4){
                            $(".warning-pull").find('.warning-pull-p').html("截止今日"+ data.time +",本部门共有<span class='fontBold'>"+ data.not_achieve +"</span>人有效通话低于<span class='fontBold'>"+ data.call_well +"</span>通,未达公司最低标准,请及时跟进处理！");
                        }else if(data.role == 6){
                            $(".warning-pull").find('.warning-pull-p').html("截止今日"+ data.time +",您的有效通话低于<span class='fontBold'>"+ data.call_well +"</span>通,未达公司最低标准,继续加油哦! ");
                        }
                        $(".warning-pull").show();
                        //通话提醒倒计时
                        var times = 5;
                        timeset=setInterval(function(){
                            if(times > 0){
                                $(".warning-pull").find('.warning-closes').text(times);   
                                times--;
                            }else if(times<=0){
                                clearInterval(timeset);
                                $(".warning-pull").find('.warning-closes').text('');
                                $(".warning-pull").find('.warning-closes').addClass('warning-close');
                            }
                        },1000);
                        $(document).on("click",".warning-close",function(){
                            $(".warning-pull").hide();
                        });
                    }
                },'json')
            break;
            //退件
            case 'bill_return' :
                if (typeof bill_return == "undefined") {
                    bill_return = new PNotify({
                        addclass: "stack-bottomright",
                        title: "权证通知",
                        text: msg.message,
                        type: "notice",
                        hide: false,
                        confirm: {
                            confirm: true,
                            buttons: [{
                                text: '去处理',
                                click: function (notice) {
                                    window.main.location.href = "message_list";
                                    delete bill_return;
                                    notice.remove();
                                }
                            },
                                null]
                        },
                        buttons: {
                            // closer_hover: false,
                            closer: false,
                            sticker: false
                        },
                        history: {
                            history: false
                        }
                    });
                    break;
                }
            break;
        }
    }
    connect.onerror = function () {
        connected();
    }
}
// connected();