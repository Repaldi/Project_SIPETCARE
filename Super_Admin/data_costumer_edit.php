<!DOCTYPE html>
<head>
    <title>Modal box dengan CSS3</title>
    <style>
        .modalDialog {
            position: fixed;
            font-family: Arial, Helvetica, sans-serif;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0,0,0,0.8);
            z-index: 99999;
            opacity:0;
            transition: opacity 200ms ease-in;
            pointer-events: none;
        }
        .modalDialog:target {opacity:1; pointer-events: auto;}
        .modalDialog > div {
            width: 400px;
            position: relative;
            margin: 10% auto;
            padding: 5px 20px 13px 20px;
            border-radius: 10px;
            background: #fff;
            background: linear-gradient(#fff, #aaa);
        }
        .close:hover { background:#00d9ff; }
        .close {
            background: #606061;
            color: #FFFFFF;
            line-height: 25px;
            position: absolute;
            text-align: center;
            top: -10px;
            right: -12px;
            width: 24px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 12px;
            box-shadow: 1px 1px 3px #000;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        span.psw {
            float: right;
        }

    </style>
</head>
<body>
<p><a href="#login">Login</a></p>


<div id="login" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">X</a>
        <h3>Please Log in</h3>
        <form  action="action_page.php">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <button type="submit">Log in</button>
            <input type="checkbox" id="Remember" checked="checked"> <label for="Remember">Remember me</label>
            <span class="psw"><a href="#login">Forgot password?</a></span>
        </form>
    </div>
</div>

</body>
</html>