<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>UTAS - Lunch</title>
    <style>
        form i {
            margin-top: -28px;
            cursor: pointer;
        }
    </style>
</head>
<body>
@yield('content')
<script>
    $(document).ready(function() {
        $(".create_account").click(function(){
            let name = $("#name").val();
            let email =  $("#email").val();
            let password =  $("#password").val();
            let confirm_password =  $("#password_confirmation").val();
            if(name != '' && email != '' && password !='' && confirm_password != ''){
                if(email){
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    regex.test(email);
                    if(!regex.test(email)){
                        alert("please enter valid email");
                        return false;
                    }
                }
                if(password.length < 8) {
                    alert("Password must be at least 8 characters")
                    return false;
                }
                if(password){
                    var regex =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~!#$])[0-9a-zA-Z, ~!#$]{8,}$/;
                    regex.test(password);
                    if(!regex.test(password)){
                        alert("Password must be at least 1 lower case letter, 1 uppercase letter, 1 number and one special character ~ ! $ #");
                        return false;
                    }
                }
                if(password != confirm_password){
                    alert("password confirmation dose not match");
                    return false;
                }
                alert("form submitted");
                return true;
            }
            else {
                alert("please fill all the fields");
                return false;
            }
        });
        $('#togglePassword').click(function (){
            var p = document.getElementById('password');
            if(p.type === 'password'){
                p.type = 'text';
                document.getElementById('togglePassword').className = "fa fa-eye fa-lg float-end pe-2"
            }
            else if(p.type === 'text'){
                p.type = 'password';
                document.getElementById('togglePassword').className = "fa fa-eye-slash fa-lg float-end pe-2"
            }
        });
        $('#togglePasswordConfirmation').click(function (){
            var p = document.getElementById('password_confirmation');
            if(p.type === 'password'){
                p.type = 'text';
                document.getElementById('togglePasswordConfirmation').className = "fa fa-eye fa-lg float-end pe-2"
            }
            else if(p.type === 'text'){
                p.type = 'password';
                document.getElementById('togglePasswordConfirmation').className = "fa fa-eye-slash fa-lg float-end pe-2"
            }
        });
    });
</script>
</body>
</html>
