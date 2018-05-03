/**
 * Created by Administrator on 2017/10/23.
 */
var sideNav = document.getElementById('sideNav');
var li = sideNav.getElementsByTagName('li')
var span = sideNav.getElementsByTagName('span')
var content = document.getElementsByClassName('content')
var arr = []
for (var i = 0; i < content.length; i++) {
    if (i == 0) {
        arr.push(content[i].offsetTop)
    } else {
        var num = content[i - 1].offsetTop + content[i - 1].offsetHeight * 1 / 4;
        arr.push(num)
    }
}
var lastContentOne = content[content.length - 2]
var lastContentTwo = content[content.length - 1]
arr.push(lastContentOne.offsetTop + lastContentOne.offsetHeight)
arr.push(lastContentTwo.offsetTop + lastContentTwo.offsetHeight)
window.onscroll = function () {
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop
    for (var j = 1; j < content.length; j++) {
        if (scrollTop < arr[j] && scrollTop >= arr[j - 1]) {
            span[j - 1].className = 'active'
        } else {
            span[j - 1].className = ''
        }
    }
}
for (var n = 0; n < li.length; n++) {
    li[n].index = n;
    li[n].onclick = function () {
        var top = 0;
        if (!this.className) {
            top = content[this.index].offsetTop
            for (var k = 0; k < span.length; k++) {
                span[k].className = ''
            }
            span[this.index].className = 'active'
        }
        document.documentElement.scrollTop = top
        document.body.scrollTop = top
    }

}
