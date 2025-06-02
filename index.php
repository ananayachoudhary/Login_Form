<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-image: linear-gradient(130deg,red,white,green);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .rf{
            width:400px;
            height:400px;
            border: 10px inset;
            padding: 40px;
            position: relative;
            top:50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border-radius: 10px;
            background-image: linear-gradient(130deg,red,white,green);
        }
        h1{
            margin-bottom: 30px;
            color:blue;
            font-weight: bold;
        }
        #name,#email,#password{
            width: 290px;
            height: 30px;
        } 
        .btn{
            width: 80px;
            height: 40px;
            margin-left: 30px;
            margin-top: 15px;
            background-image: linear-gradient(130deg,orange,white,blue);
            border-radius: 30px;
            border: 5px inset white;
            cursor: pointer;
        }
        


      
        
    </style>
</head>
<body>
    <div class="con">
        
        <h1>User SignUp/SignIn</h1>
        <form action="" method="post">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name"><br><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" class="btn" value="SignUp" name="signup" id="signup">
            <input type="submit" class="btn" value="SignIn" name="signin" id="signin">
        </form>
    </div>   

<?php
if(isset($_POST['signup']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mycon=mysqli_connect('localhost','root','','login');
        $q="insert into users values ('$name','$email','$password')";
        $res=mysqli_query($mycon,$q);
        echo "Signup completed!";
        mysqli_close($mycon);
    }

    if(isset($_POST['signin']))

    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mycon=mysqli_connect('localhost','root',"",'login');
        $q="select * from users WHERE email='$email' and password='$password'";
        $res=mysqli_query($mycon,$q);
        
        if(mysqli_num_rows($res)>0)
        {
            echo "login sucessfull";
        }
         else{
            echo"login failed:";
        }
        mysqli_close($mycon);
    }
        
?>
    </div>
</body>
</html>