/**
 * Created by Administrator on 2017/10/22.
 */

window.onload = function () {
    var box = document.getElementById('box');
    var ul = box.getElementsByTagName('ul')[0];
    var liList = ul.getElementsByTagName('li');
    var right = document.getElementById('right')
    var left = document.getElementById('left');
    var spans = document.getElementById('count').getElementsByTagName('span');
    var imgWidth = liList[0].offsetWidth;
    var index = 1;
    var num = 0
    box.timer = setInterval(showRight, 3000);
    box.onmouseenter = function () {
        clearInterval(box.timer);
        left.style.opacity = '0.5'
        left.onclick = showLeft;
        right.style.opacity = '0.5'
        right.onclick = showRight;
    }
    box.onmouseleave = function () {
        box.timer = setInterval(showRight, 3000);
        left.style.opacity = '0'
        right.style.opacity = '0'
    }
    function showRight() {
        index++;
        num++;
        if (num >= spans.length) {
            num = 0;
        }
        if (index >= liList.length) {
            ul.style.left = -imgWidth + 'px';
            index = 2;
        }
        fnMove(ul, {left: -imgWidth * index})
        activeSpan(num);
    }
    function showLeft() {
        index--;
        num--;
        if (num < 0) {
            num = spans.length - 1;
        }
        if (index < 0) {
            ul.style.left = -imgWidth * (liList.length - 2) + 'px';
            index = (liList.length - 3);
        }
        fnMove(ul, {left: -imgWidth * index})
        activeSpan(num);
    }
    for (var i = 0; i < spans.length; i++) {

        spans[i].index = i + 1;
        spans[i].onclick = function () {
            i = this.index;
            num = i - 1;
            fnMove(ul, {left: -imgWidth * (num + 1)})
            index = this.index;
            activeSpan(index - 1)
        }
        fnMove(ul, {left: -imgWidth * index})
    }


    function activeSpan(num) {

        for (var i = 0; i < spans.length; i++) {
            spans[i].className = '';
        }
        spans[num].className = 'bgcolor'

    }

}
