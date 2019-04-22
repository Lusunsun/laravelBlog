<?php

function json($code,$data,$msg,$type=''){
    return [
        'code'=>$code,
        'data'=>$data,
        'msg'=>$msg,
        'type'=>$type
    ];
}

/**前端展示列表时 第key个tr的颜色
 * @return array
 */
function trColor()
{
    return [
        1 => 'success',
        3 => 'info',
        5 => 'danger',
        7 => 'warning',
        9 => 'primary'
    ];
}