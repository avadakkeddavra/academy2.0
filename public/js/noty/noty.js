
function noty(type,head,text)
{
    if(type == 'error')
    {   
        $('.notify').addClass('error');
        $('.notify').removeClass('success');
        $('.notify').removeClass('default');
        $('.notify').find('.notify_type').html('<i class="fa fa-close"></i>');
    }else if(type == 'success')
    {   
        $('.notify').addClass('success');
        $('.notify').removeClass('error');
        $('.notify').removeClass('default');
        $('.notify').find('.notify_type').html('<i class="fa fa-check"></i>');
    }else{
        $('.notify').removeClass('success');
        $('.notify').removeClass('error');
        $('.notify').addClass('default');
        $('.notify').find('.notify_type').html('<i class="fa fa-check"></i>');
    }
    $('.notify_title').text(head);
    $('.notify_body p').text(text);
    $('.notify').fadeIn('200');
    $('.notify').animate({
        'right':'0px',
    },200);

}
$(document).ready(function(){
    $('#closeNoty').click(function(){
        if($('.notify').is(':visible'))
        {
            $('.notify').animate({
                'right':'-500px',
            },200,'linear',function(){
                $(this).fadeOut(200);
            })
        }
    })
})