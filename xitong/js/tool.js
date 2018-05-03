/**
 * Created by Administrator on 2017/10/22.
 */
function fnMove(ele, obj,callback) {
    clearInterval(ele.timer);
    ele.timer = setInterval(function () {
        var fnStop = true;
        for (var attr in obj) {
            var curr = 0;
                curr = parseInt(getStyle(ele, attr))
            var speed = (obj[attr] - curr)/6;
            speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);

            if(speed != 0){
                fnStop = false;
            }
                ele.style[attr] = curr + speed + 'px'
        }
        if (fnStop){
            clearInterval(ele.timer);
            if(callback){
                callback();
            }
        }
    }, 30)
}
function getStyle(ele, sAttr) {
    if (window.getComputedStyle) {
        sAttr = window.getComputedStyle(ele, null)[sAttr];
    } else {
        sAttr = ele.currentStyle(sAttr);
    }
    return sAttr
}