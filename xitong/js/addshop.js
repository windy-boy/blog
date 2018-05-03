/**
 * Created by Administrator on 2017/12/1.
 */
$(function () {
    $('.small-buy').click(function () {
      var result= $(this).parent('li').find('img').attr('src');
        $.post('shoppingcart.php',{result:result});
        $(location).attr('href', 'http://localhost:9009/xitong/shoppingcart.php');

    })
})