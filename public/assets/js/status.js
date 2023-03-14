$(document).ready(function(){
    function  editStatus(type, id, value){
        $.ajax({
            method: "POST",
            url: "./../private/status_service.php",
            data: `type=${type}&id=${id}&value=${value}`,
            success: function(data){
                console.log(data);
                let obj = JSON.parse(data);
                if(obj.result) window.location.reload(true);
            },
            error: function(data){},
            complete: function(){}
        })
    }

    $(document).on('click', '.edit_status', function(){
        let type = $(this).data("type");
        let id = $(this).data("id");
        let value = $(this).data("value");

        editStatus(type, id ,value);
    });
});