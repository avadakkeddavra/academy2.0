	$(document).ready(function(){
		$('.typeSort button').click(function(){
			$.ajax({
				url:'/admin',
				data:{type:$(this).data('type')},
				headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
		        type:'POST',
		        dataType:'json',
		        success:function(response)
		        {
		        	$('#newsTable tbody').empty();
		        	for(i in response.data)
		        	{
		        		var item = response.data[i];
		        		switch(item.type)
		        		{
											case 0:
												var type = 'новость';
											break;
											
											case 1:
												var type = 'статья';
											break;
											
											case 2:
												var type = 'событие';
											break;
		        		}
		        		var row = '<tr style="display: none;"><td>'+item.title+'</td><td>'+type+'</td><td>'+item.text.substring(0,50)+'...</td><td>'+item.updated_at+'</td></tr>';
		        		console.log(row);
		        		$('#newsTable tbody').append(row);
		        	}

		        	$('#newsTable tbody').children('tr').each(function(i,elem){
		        		$(this).fadeIn(200);
		        	})
		        }
			})
		})
	})