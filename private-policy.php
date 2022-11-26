<!DOCTYPE html>
<html>

<head>
    <title>DRB News | Details| </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;

        }


        #error-page {
            position: absolute;
            top: 10%;
            left: 15%;
            right: 15%;
            bottom: 10%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.1);
        }

        #error-page .content {
            max-width: 600px;
            text-align: center;
        }

        .content h2.header {
            font-size: 18vw;
            line-height: 1em;
            position: relative;
        }

        .content h2.header:after {
            position: absolute;
            content: attr(data-text);
            top: 0;
            left: 0;
            right: 0;
            background: -webkit-repeating-linear-gradient(-45deg, #71b7e6, #69a6ce, #b98acc, #ee8176, #b98acc, #69a6ce, #9b59b6);
            background-size: 400%;

            -webkit-text-fill-color: transparent;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.25);
            animation: animate 10s ease-in-out infinite;
        }

        @keyframes animate {
            0% {
                background-position: 0 0;
            }

            25% {
                background-position: 100% 0;
            }

            50% {
                background-position: 100% 100%;
            }

            75% {
                background-position: 0% 100%;
            }

            100% {
                background-position: 0% 0%;
            }
        }

        .content h4 {

            margin-bottom: 20px;

            color: #000;
            font-size: 5vw;
            max-width: 600px;
            position: relative;
        }

        .content h4:after {
            position: absolute;
            content: attr(data-text);
            top: 0;
            left: 0;
            right: 0;
            text-shadow: 1px 5px 10px rgba(255, 255, 255, 0.4);

            -webkit-text-fill-color: transparent;
        }

        .content p {
            font-size: 1.2em;
            color: #0d0d0d;
        }

        .content .btns {
            margin: 25px 0;

        }

        .content .btns a:hover {
            background: #d35400;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div id="error-page">
            <div class="content">
                <h2 class="header" data-text="404">
                    404</h2>
                <h4 class="col-sm-12">
                    त्रुटि!! पृष्ठ फेला परेन</h4>
                <br>
                <div class="btns">
                    <a href="../index.php" class="btn btn-info">Home</a>

                    <a href="" class="btn btn-warning">Report Admin</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>

    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>