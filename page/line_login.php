
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="../css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../css/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b style="color:black">LINE LOGIN</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body" style="border-radius:10px"  >
                <p class="login-box-msg">Sign in wiht line</p>

                <form class="form" id="test" action="../backend/line_login_next.php" method="POST">
                    <img class="d-block m-auto" style="border-radius:50%" id="pictureUrl" width="100">

                    <p id="displayName" class="text-center">Name : </p>

                    <input type="hidden" id="user" name="user">
                    <input type="hidden" id="name" name="name">
                    <input type="hidden" id="status" name="status">

                    <input type="hidden" id="email" name="email">

                    <input type="hidden" id="access" name="accessToken">

                    <input class="btn btn-success d-block m-auto" id="btn" type="submit" value="NEXT"></input>

                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

    <?php require('../backend/host_ngrok.php') ?>
    <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script>
        function logOut() {
            liff.logout();
            window.location.reload();
        }

        function logIn() {
            liff.login({
                redirectUri: window.location.href
            });

        }


        async function getUserProfile() {
            const profile = await liff.getProfile();
            document.getElementById("pictureUrl").style.display = "block";
            document.getElementById("pictureUrl").src = profile.pictureUrl;
            document.getElementById("displayName").append(profile.displayName);

            document.getElementById("user").value = profile.userId;


        }

        async function main() {
            await liff.init({
                liffId: "1656690602-3lqQwdRX"
            });
            if (liff.isInClient()) {
                getUserProfile();

            } else {
                if (liff.isLoggedIn()) {
                    getUserProfile();

                    const profile = await liff.getProfile();

                    document.getElementById("name").value = profile.displayName;
                    document.getElementById("status").value = profile.statusMessage;
                    document.getElementById("access").value = (liff.getAccessToken());
                    document.getElementById("email").value = (liff.getDecodedIDToken().email);
                    document.getElementById("useos").value = (liff.getOS());
                    document.getElementById("uselanguage").value = (liff.getLanguage());
                    document.getElementById("useversion").value = (liff.getVersion());
                    document.getElementById("useisInClient").value = (liff.isInClient());
                    document.getElementById("usetype").value = (liff.getContext().type);
                    document.getElementById("useviewType").value = (liff.getContext().viewType);



                    document.getElementById("btnLogIn").style.display = "none";
                    document.getElementById("btnLogOut").style.display = "block";


                } else {
                    liff.login(

                        {
                            redirectUri: window.location.href = "<?= $host_ngrok ?>/DEENA/Users_level/page/line_login.php"
                        }
                    )

                    document.getElementById("btnLogIn").style.display = "block";
                    document.getElementById("btnLogOut").style.display = "none";


                }
            }
        }


        main();
    </script>
    <!-- /.login-box -->


    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
</body>

</html>