$(document).ready(function(){
	CKEDITOR.replace('text')
});

// Создание Новостей
$(document).ready(function(){
	
	$('#file').on('change',function(){
		
		$('#uploadImg').click(function(){
			var data = new FormData;

            data.append('img',$('#file').prop('files')[0]);

            $.ajax({
                url:'/admin/uploadNewsImg',
                data:data,
                processData: false,
                contentType:false,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    
                }
            })
		});

	});



    $('#create').on('click',function(){

        var img = $('.createNew #file').val();
        if(img == '')
        {
            var img = $('.createNew #file').attr('value');
        }
        if(img != undefined)
        {
            img = img.split('\\');
            img = img[img.length-1];
        }
        
        if($('#file_name').val() != '')
        {
            img = $('#file_name').val();
        }     

        var data = {
            priority:$('#priority').val(),
            title: $('.createNew #title').val(),
            type: $('.createNew #type').val(),
            img: img,
            caf_id: $('.createNew #caf_id').val(),
            text:CKEDITOR.instances['text'].getData(),
            post_type: 'new'

        };

        console.log(data);

        if(type == 'create')
        {
            var url = '/admin/create';
        }else if(type == 'update'){
            var url = '/admin/update/new/'+id;
        }

        $.ajax({
            url:url,
            data:data,
            type:'POST',
            dataType:'json',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response)
            {
                if(response.success == 1)
                    {
                        noty('success','Успешно','Новость успешно создана');
                    }
                    else{
                        noty('error','Ошибка',response.response)
                    }
            },
            error:function(xhr)
            {
                console.log(xhr.responseJSON);
                for(i in xhr.responseJSON)
                {
                    var error = xhr.responseJSON[i];

                    $('#'+i).parents('.form-group').addClass('has-error');
                    var errorText = error[0];

                    $('.errors').append('<p>* '+errorText+'</p>')
                }
                noty('error','Ошибка','Проверьте правильность ввода')
            }
        });
    })

    $('.close_imager').click(function(){
        if($(this).parents('.imager').is(':visible'))
        {
            $(this).parents('.imager').fadeOut(200);
        }
    });

    $('.image-pick').on('click',function(){
        var name = $(this).data('name');
        
        $('#file_name').val(name);
        $(this).parents('.imager').fadeOut(200);
        $('#file').addClass('disable');
        $('#file').attr('disabled','disabled')
        $('.file_checked_name').html('<i class="fa fa-image"></i>'+name);
    });
})  
