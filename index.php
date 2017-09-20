<!DOCTYPE html>
<html lang="en" xmlns:https="http://www.w3.org/1999/xhtml"> <!--todo:populate read me and test on heroku-->  <!--link to external file sheets -->
	<head>
		<title>Slack Invite</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php
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
                $result = "You have already been invited.Go check your email";
            } elseif (strpos($output, "token_revoked") !== false) {
                $result = "The token used for authentication has been revoked,Contact the admin of the slack team";
            } else {
                $result = "Some thing went wrong";
            }
            echo "<script>alert('" . $result . "');</script>";

        }
        ?>
    </head>
    <style>
        body{
            background: url(https://images.duckduckgo.com/iu/?u=https%3A%2F%2Fs-media-cache-ak0.pinimg.com%2Foriginals%2F95%2Fe1%2F39%2F95e139350a20124207db2a23a036c0ef.jpg&f=1) no-repeat center fixed;
            background-size: cover;
        }
        #change_color{
            color: plum;
        }
    </style>
	<body class="img-responsive" style="padding: 2%;margin: 2%;">
        <div class="show_stuff" style="height: auto;width: 50% ;margin-left: auto ;margin-right: auto ;padding-top: 20%">
            <div class="form-group" style="height: 100%;width: 100%">
                <p class="only" id="change_color">Invite users to your slack page</p>
                <form>
                    <label for="email" id="change_color">Email address:</label>
                    <div class="input-group">
                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-default" style="color:orange; background-color: black">Oya,send me my invite</button>
                    <!--<button type="submit" name="submit" style="color:#8b0000;width: auto;-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;margin: 2%;padding: 2%"><strong style="color: darkred;">OYA,SEND ME MY INVITE</strong></button>-->
                </form>

            </div>
        </div>                                                       \
	</body>
</html>



  <!-- <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email" style="width: 70%;-webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px;padding: 2%;margin: 2%;" required>-->