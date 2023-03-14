$(document).ready(function(){
    const register = () => {
        let form = $(document).find("form");
        let formInput = $(form).find("input");
        formInput.each(function(){
            if($(this).val().length == 0){
                $.notify("Nie podano wszystkich danych", "error");
                return false;
            }
        });

        
         $.ajax({
            method: "POST",
            url: "./../private/register_service.php",
            data: `type=REGISTER&${$(form).serialize()}`,
            success: function(data){
                let obj = JSON.parse(data);
                console.log(obj);
                if(obj.result) window.location.href = "./login.php";
                else $.notify(obj.message, "error");
            },
            error: function(data){},
            complete: function(){}
        })
        
    }
    
    $(document).on('click', '.register_btn', function(){
        register();
    }) 
});