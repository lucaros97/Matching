/**
 * Created by luca on 26/05/16.
 */


$(function(){
    $('.eliminaPartita').click(function(){
        var id= $(this).attr('data-id');
        var $ele = $(this).parent().parent();
        $.ajax({
            type:'POST',
            url:'delete.php',
            data:{id:id},
            success: $ele.fadeOut()
        })
    })
});