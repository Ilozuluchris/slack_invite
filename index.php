<!DOCTYPE html>
<html lang="en" xmlns:https="http://www.w3.org/1999/xhtml"> <!--todo:populate read me--> <!--link to external file sheets -->
	<head>
		<title>Slack Invite</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body class="container" style="padding: 2%;margin: 2%;background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUuZHPGWy0430olAXdHNGw95ckQlT0QnSfVMP18PSbRqwnyjIEAg);background-repeat: no-repeat;background-size: 100% 300%;background-clip: padding-box">
        <div class="show_stuff" style="height: auto;width: 50% ;margin-left: auto ;margin-right: auto ;padding-top: 40%;">
            <p class="only" style="padding: 2%;margin: 2%">Invite users to you slack page</p>
            <div class="form-group" style="height: 100%;width: 100%">
                <form>
                    <label for="email" style="padding-left: 3%;">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" style="width: 70%;-webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px;padding: 2%;margin: 2%;" required>
                    <small id="emailHelp" class="form-text text-muted" style="padding-left: 3%"> Enter the email,you want to use this slack team.</small>
                    <button type="submit" name="submit" class="btn btn-primary" style="width: auto;-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;margin: 2%;padding: 2%">OYA,SEND ME MY INVITE</button>
                </form>

            </div>
        </div>
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
                $result = "You have already been invited.";
            } elseif (strpos($output, "token_revoked") !== false) {
                $result = "The token used for authentication has been revoked,Contact the admin of the slack team";
            } else {
                $result = "Some thing went wrong";
            }
            echo "<script>alert('" . $result . "');</script>";
        }
        ?>

	</body>
</html>
