<html>
<head>
    <style>
        body {
            background-color: #dedede;
        }

        .loader {
            width: 56px;
            height: 56px;
            border: 3px solid #000;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
<div class='body'>
    <div style="display: flex;flex-direction: column;height: 100vh">
        <div class="loader" style="margin:auto"></div>
    </div>
</div>
</body>
</html>
