<?php
include('dbcon.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $sql = "INSERT INTO `servey_data` ( `name`, `email`, `phone_no`, `area`, `city`, `state`, `interested_place`,`ip_address`)  VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["area"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["interested_place"]."','".$_SERVER['REMOTE_ADDR']."')";
   if ($conn->query($sql) === TRUE) {
    $loc = $_SERVER["PHP_SELF"]."?status=success";
    echo '<script>toastr.success("Form submitted successfully!");</script>';
    } else {
        $loc = $_SERVER["PHP_SELF"]."?status=error";
    }
    header("Location: " . $loc);
}
if(isset($_GET) && $_GET['status'] == "success"){
    $msg = "Submited Successfully";
}
if(isset($_GET) && $_GET['status'] == "error"){
    $msg = "Something Went Wrong <a href='http://eatiano.com'> Click Here</a>";

}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eatiano</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<style>
    :root {
        --primary-color: #4EA685;
        --secondary-color: #57B894;
        --black: #000000;
        --white: #ffffff;
        --gray: #efefef;
        --gray-2: #757575;

        --facebook-color: #4267B2;
        --google-color: #DB4437;
        --twitter-color: #1DA1F2;
        --insta-color: #E1306C;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        height: 100vh;
       
        background-image: url("https://images.unsplash.com/photo-1543353071-10c8ba85a904?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80");
        background-size: cover;
    }

    .container {
        position: relative;
        min-height: 100vh;
        overflow: hidden;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        height: 100vh;
    }

    .col {
        width: 50%;
    }

    .align-items-center {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .form-wrapper {
        width: 100%;
        max-width: 28rem;
    }

    .form {
        padding: 1rem;
        background-color: var(--white);
        border-radius: 1.5rem;
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transform: scale(0);
        transition: .5s ease-in-out;
        transition-delay: 1s;
    }

    .input-group,textarea {
        position: relative;
        width: 100%;
        margin: 1rem 0;
    }

    .input-group i {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
        font-size: 1.4rem;
        color: var(--gray-2);
    }

    .input-group input,.input-group textarea {
        width: 100%;
        padding: 1rem 1rem;
        font-size: 1rem;
        background-color: var(--gray);
        border-radius: .5rem;
        border: 0.125rem solid var(--white);
        outline: none;
    }

    .input-group input:focus,.input-group textarea:focus {
        border: 0.125rem solid var(--primary-color);
    }

    .form button {
        cursor: pointer;
        width: 100%;
        padding: .6rem 0;
        border-radius: .5rem;
        border: none;
        background-color: var(--primary-color);
        color: var(--white);
        font-size: 1.2rem;
        outline: none;
    }

    .form p {
        margin: 1rem 0;
        font-size: .7rem;
    }

    .flex-col {
        flex-direction: column;
    }

    .social-list {
        margin: 2rem 0;
        padding: 1rem;
        border-radius: 1.5rem;
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transform: scale(0);
        transition: .5s ease-in-out;
        transition-delay: 1.2s;
    }

    .social-list>div {
        color: var(--white);
        margin: 0 .5rem;
        padding: .7rem;
        cursor: pointer;
        border-radius: .5rem;
        cursor: pointer;
        transform: scale(0);
        transition: .5s ease-in-out;
    }

    .social-list>div:nth-child(1) {
        transition-delay: 1.4s;
    }

    .social-list>div:nth-child(2) {
        transition-delay: 1.6s;
    }

    .social-list>div:nth-child(3) {
        transition-delay: 1.8s;
    }

    .social-list>div:nth-child(4) {
        transition-delay: 2s;
    }

    .social-list>div>i {
        font-size: 1.5rem;
        transition: .4s ease-in-out;
    }

    .social-list>div:hover i {
        transform: scale(1.5);
    }

    .facebook-bg {
        background-color: var(--facebook-color);
    }

    .google-bg {
        background-color: var(--google-color);
    }

    .twitter-bg {
        background-color: var(--twitter-color);
    }

    .insta-bg {
        background-color: var(--insta-color);
    }

    .pointer {
        cursor: pointer;
    }

    .container.sign-in .form.sign-in,
    .container.sign-in .social-list.sign-in,
    .container.sign-in .social-list.sign-in>div,
    .container.sign-up .form.sign-up,
    .container.sign-up .social-list.sign-up,
    .container.sign-up .social-list.sign-up>div {
        transform: scale(1);
    }

    .content-row {
        position: absolute;
        top: 0;
        left: 0;
        pointer-events: none;
        z-index: 6;
        width: 100%;
    }

    .text {
        margin: 4rem;
        color: var(--white);
    }

    .text h2 {
        font-size: 3.5rem;
        font-weight: 800;
        margin: 2rem 0;
        transition: 1s ease-in-out;
    }

    .text p {
        font-weight: 600;
        transition: 1s ease-in-out;
        transition-delay: .2s;
    }

    .img img {
        width: 30vw;
        transition: 1s ease-in-out;
        transition-delay: .4s;
    }

    .text.sign-in h2,
    .text.sign-in p,
    .img.sign-in img {
        transform: translateX(-250%);
    }

    .text.sign-up h2,
    .text.sign-up p,
    .img.sign-up img {
        transform: translateX(250%);
    }

    .container.sign-in .text.sign-in h2,
    .container.sign-in .text.sign-in p,
    .container.sign-in .img.sign-in img,
    .container.sign-up .text.sign-up h2,
    .container.sign-up .text.sign-up p,
    .container.sign-up .img.sign-up img {
        transform: translateX(0);
    }

    /* BACKGROUND */

    .container::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        height: 100vh;
        width: 300vw;
        transform: translate(35%, 0);
        /* background-image: linear-gradient(-45deg, var(--primary-color) 0%, var(--secondary-color) 100%); */
        transition: 1s ease-in-out;
        background-color: transparent;
        z-index: 6;
        background-color: rgb(10 5 5 / 60%);
        box-shadow: rgb(0 0 0 / 62%) 0px 5px 15px;
        /* filter: blur(8px); */
        border-bottom-right-radius: max(50vw, 50vh);
        border-top-left-radius: max(50vw, 50vh);
    }

    .container.sign-in::before {
        transform: translate(0, 0);
        right: 50%;
    }

    .container.sign-up::before {
        transform: translate(100%, 0);
        right: 50%;
    }

    /* RESPONSIVE */

    @media only screen and (max-width: 425px) {

        .container::before,
        .container.sign-in::before,
        .container.sign-up::before {
            height: 100vh;
            border-bottom-right-radius: 0;
            border-top-left-radius: 0;
            z-index: 0;
            transform: none;
            right: 0;
        }

        /* .container.sign-in .col.sign-up {
        transform: translateY(100%);
    } */

        .container.sign-in .col.sign-in,
        .container.sign-up .col.sign-up {
            transform: translateY(0);
        }

        .content-row {
            align-items: flex-start !important;
        }

        .content-row .col {
            transform: translateY(0);
            background-color: unset;
        }

        .col {
            width: 100%;
            position: absolute;
            padding: 2rem;
            background-color: var(--white);
            border-top-left-radius: 2rem;
            border-top-right-radius: 2rem;
            transform: translateY(100%);
            transition: 1s ease-in-out;
        }

        .row {
            align-items: flex-end;
            justify-content: flex-end;
        }

        .form,
        .social-list {
            box-shadow: none;
            margin: 0;
            padding: 0;
        }

        .text {
            margin: 0;
        }

        .text p {
            display: none;
        }

        .text h2 {
            margin: .5rem;
            font-size: 2rem;
        }
        .logo img{
        width: 20%;
    
    }
    .input-group input, .input-group textarea {
    width: 100%;
    padding: 1rem 1rem;
    font-size: 0.8rem !important;
    background-color: var(--gray);
    border-radius: 0.5rem;
    border: 0.125rem solid var(--white);
    outline: none;
}
.sign-in{
    margin-bottom: 2.5rem;
}
    }
    .logo{
    position: absolute;
    top: 0;
    left: 0;
    z-index: 45;
    }
    .logo img{
        width: 30%;
    margin: 15px;
    border-radius: 30px;
    }
    
</style>

<body>
    <div id="container" class="container">
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" placeholder="text">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" placeholder="Confirm text">
                        </div>
                        <button>
                            Sign up
                        </button>
                        <p>
                            <span>
                                Already have an account?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Sign in here
                            </b>
                        </p>
                    </div>
                </div>

            </div>
            <!-- END SIGN UP -->
            <!-- SIGN IN -->
            <!-- <form method="post" action="
            <?php 
            // echo $_SERVER["PHP_SELF"]; 
            ?>
            "> -->
            <div class="col align-items-center flex-col sign-in">
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form-wrapper align-items-center">
                    <div class="form sign-in">
                        <div class="input-group">
                        <?php
                        
                            echo $msg;
                        
                        ?>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" required name="name" placeholder="Enter Your Name">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" required name="email" placeholder="Enter Your Email">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" required name="phone" placeholder="Enter Your Phone Number">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" name="area" required placeholder="Enter Your Area">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" name="city" required placeholder="Enter Your City">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" name="state" required placeholder="Enter Your State">
                        </div>
                        
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" name="interested_place" required placeholder="Which place are you the most excited to order from?">
                        </div>

                        <button>
                            Submit
                        </button>

                    </div>
                </form>
                <div class="form-wrapper">

                </div>
            </div>
            <!-- END SIGN IN -->
        </div>
        <div class="logo">
            <img src="data:image/png;base64,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" alt="">
        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <!-- SIGN IN CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Welcome
                    </h2>

                </div>
                <div class="img sign-in">

                </div>
            </div>
            <!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up">

                </div>
                <div class="text sign-up">
                    <h2>
                        Join with us
                    </h2>

                </div>
            </div>
            <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        let container = document.getElementById('container')

        toggle = () => {
            container.classList.toggle('sign-in')
            container.classList.toggle('sign-up')
        }

        setTimeout(() => {
            container.classList.add('sign-in')
        }, 200)
        toastr.options = {
        "positionClass": "toast-top-right", // Set your desired position
        // Add other Toastr options as needed
    };
    </script>
   
</body>

</html>