$(document).ready(function(){  
    let remodal = $(document).find('.remodal');

    $(document).on('click', '.remodal-open', function(){

        let type = $(this).data("type");
        let values = $(this).data("values");
        let remodalContent = $(remodal).find(".remodal__data");

        $.ajax({
            method: "POST",
            url: "./../private/remodal_service.php",
            data: `type=${type}&values=${values}`,
            success: function(data){
                $(remodalContent).html(data);
                $(remodal).css("display", "flex");
            },
            error: function(data){},
            complete: function(){}
        })
        
    });

    $(document).on('click', '.remodal__close', function(){
        $(remodal).css("display", "none");
    });

    $(document).on('click', '.cancel', function(){
        $(remodal).css("display", "none");
    });


    function generateUpdateData(){
        let inputsData = $(remodal).find(".remodal_input");
        let selectData = $(remodal).find(".remodal_select");
        let dataString = '';


        $(inputsData).each(function(){
            let name = $(this).data('name');
            let value = $(this).val();

            dataString += name+"="+value+"&";
        });

        $(selectData).each(function(){
            let name = $(this).data('name');
            let value = $(this).find(':selected').val();

            dataString += name+"="+value+"&";
        });

        dataString = dataString.substring(0,dataString.length-1);
        return dataString;
    }

    $(document).on('click', '.ok', function(){
        let res = generateUpdateData();
        let type = $(remodal).find(".hidden_input_redirect").data("name");
        let data = `type=${type}&${res}`;
        $.ajax({
            method: "POST",
            url: "./../private/remodal_update_service.php",
            data: data,
            success: function(data){
                console.log(data)
                let obj = JSON.parse(data);
                if(obj.result){
                    window.location.reload(true);
                }
                else{
                    $.notify(obj.message, "error");
                }
            },
            error: function(data){},
            complete: function(){}
        })
    })
})