/**
 * Created by Administrator on 2017/10/25.
 */
$(function(){
    $('.banxin').find('.small-buy').hide();

    $('.banxin').find('li').hover(function(){
        $(this).find('.small-buy').slideDown(300);
    },function(){
        $(this).find('.small-buy').slideUp(300);
    });
})