$(document).ready(function(){
    
    const login = () => {
        let login = $(".email_input"), pwd = $(".pwd_input");
        let loginval = $(login).val(), pwdVal = $(pwd).val();
        
        if(loginval.length <= 0){
            $.notify("Podaj login", "error");
            return 0;
        }
        else if(pwdVal.length <= 0){
            $.notify("Podaj Hasło", "error");
            return 0;
        }

        $.ajax({
            method: "POST",
            url: "./../private/login_service.php",
            data: `type=LOGIN&login=${loginval}&password=${pwdVal}`,
            success: function(data){
                let obj = JSON.parse(data);
                if(obj.value) window.location.reload(true);
                else $.notify(obj.message, "error");
            },
            error: function(data){},
            complete: function(){}
        })
    }

    const logout = () => {
        $.ajax({
            method: "POST",
            url: "./../private/login_service.php",
            data: 'type=LOGOUT',
            success:function(data) {
                console.log(data)
                let obj = JSON.parse(data);
                console.log(obj)
                if(obj.value) window.location.href = "../index.php" ;
                else logout();
            },
            error:function() {},
            complete:function() {
            }
        })
    }
    
    $(document).on('click', '.login_btn', function(){
        login();
    });

    $(document).on('click', '.logout_btn', function(){
        logout();
    });
})