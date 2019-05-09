<li class= "clearfix">
    <div class="message" style="float: left">
        <div class="info">
            <h3 style="float: left">{{ $param['name'] }}</h3>
            <span class="date">{{ date('Y-m-d H:i:s', $param['time']) }}</span>
            <span class="date">IP:127.0.0.1</span>
        </div>
        <p>{{ $param['content'] }}</p>
    </div>
    <div class="clear"></div>
</li>