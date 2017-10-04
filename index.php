<!DOCTYPE html>
<html lang="en"> 
	<head>
		<title>Slack Invite</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <?php
        #if $_GET does not contain the values in the form replace it with $_POST
        if (isset($_GET['submit'])) {

            $email = $_GET["email"];

            $response = file_get_contents("settings.json");
            $response = utf8_encode($response);
            $json = json_decode($response, true);

            $team_url = $json["team_url"]; #put in slack team url like myslackteam.slack.com
            $token = $json["token"];
            $real_url = "'" . 'https://' . $team_url . '/api/users.admin.invite' . "'";
            $send = "'" . 'email=' . $email . '&token=' . $token . '&set_active=true' . "'";

            $command = "curl -X POST " . $real_url . " \
        --data " . $send . " \
        --compressed";
            $output = exec($command);#this sends the api call

            if (strpos($output, 'true') !== false) {
                $result = "An invite link has been sent to you";
            } elseif (strpos($output, 'already_invited') !== false) {
                $result = "You have already been invited. Go check your email";
            } elseif (strpos($output, "token_revoked") !== false) {
                $result = "The token used for authentication has been revoked, Contact the admin of the slack team";
            } else {
                $result = "Some thing went wrong";
            }
            echo "<script>alert('" . $result . "');</script>";
        }
        ?>

        <style>
            html, body, .wrapper {
                height: 100%;
            }
            body{
                background: -webkit-radial-gradient(circle, #045757 0.75em, rgba(255, 255, 255, 0) 0.75em, rgba(255, 255, 255, 0) 1.5em, rgba(4, 67, 67, 0.7) 1.5em, rgba(4, 67, 67, 0.7) 1.8em, rgba(255, 255, 255, 0) 1.8em) 0 0, -webkit-radial-gradient(circle, #044343 0.75em, rgba(255, 255, 255, 0) 0.75em, rgba(255, 255, 255, 0) 1.5em, rgba(4, 87, 87, 0.7) 1.5em, rgba(4, 87, 87, 0.7) 1.8em, rgba(255, 255, 255, 0) 1.8em) 3em 3em, -webkit-radial-gradient(circle, rgba(4, 87, 87, 0.7) 0.375em, rgba(255, 255, 255, 0) 0.375em) 3em 0, -webkit-radial-gradient(circle, rgba(4, 67, 67, 0.7) 0.3em, rgba(255, 255, 255, 0) 0.3em) 0 3em;
                background: radial-gradient(circle, #045757 0.75em, rgba(255, 255, 255, 0) 0.75em, rgba(255, 255, 255, 0) 1.5em, rgba(4, 67, 67, 0.7) 1.5em, rgba(4, 67, 67, 0.7) 1.8em, rgba(255, 255, 255, 0) 1.8em) 0 0, radial-gradient(circle, #044343 0.75em, rgba(255, 255, 255, 0) 0.75em, rgba(255, 255, 255, 0) 1.5em, rgba(4, 87, 87, 0.7) 1.5em, rgba(4, 87, 87, 0.7) 1.8em, rgba(255, 255, 255, 0) 1.8em) 3em 3em, radial-gradient(circle, rgba(4, 87, 87, 0.7) 0.375em, rgba(255, 255, 255, 0) 0.375em) 3em 0, radial-gradient(circle, rgba(4, 67, 67, 0.7) 0.3em, rgba(255, 255, 255, 0) 0.3em) 0 3em;
              background-size: 6em 6em;
              background-color: #222;
              background-repeat: repeat;
              color:#fff;
            }
            .wrapper {
                display: -webkit-box;
                display: flex;
                -webkit-box-align:center;
                        align-items:center;
                -webkit-box-pack: center;
                        justify-content: center;
            }
            .wrapper-inner {
                max-width:580px;
                width: 100%;
            }
            input[type="email"],input[type="text"], button {
                width: 100%;
                display: block!important;
                margin: 0 auto 25px;
            }
            .email_label {
                margin-bottom: 1rem;
            }
            .btn {
                background-color: orangered;
                color: white;
                border: 1px solid #17afb8;
            }
            @media (max-width:500px) {
                .wrapper-inner {
                    padding: 25px;
                }
            }

        </style>

    </head>
    

	<body>
        <div class="wrapper">
            <div class="wrapper-inner">
                <p class="only" id="change_color"></p>
                <form>
                    <label class ="email_label" for="email" id="change_color"></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <button type="submit" class="btn btn-default" id="submit" name="submit">Oya,send me my invite</button>
                </form>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $.getJSON("settings.json", function (data) {
                console.log(data);
                $(".only").append(data['team_name']);
                $(".email_label").append("Enter email to join  " + data['team_name']);
            });
        </script>

	</body>
</html>
<!-- todo: improve spacing between team name and more styling-->
