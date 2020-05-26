$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#sortable').sortable({
        update:function(event,ui){
            $(this).children().each(function(index){
                
                if($(this).attr('data-position') !=(index+1)){
                    $(this).attr('data-position',(index+1)).addClass('updated')
                }
            });
            saveNewPositions();
        }
    });
});
function saveNewPositions()
{
    var positions=[];
    $('.updated').each(function(){
        var index=$(this).attr('data-position');
        var image_id=$(this).attr('data-image-id');
        positions.push({index:index, image_id:image_id});
        $(this).removeClass('updated');
    });        
    $.ajax({  
        url:"change_my_position",
        type:'post',
        data:{update:1,positions:positions},
        success:function(response)
        {
            console.table(response);
        }
    })
}