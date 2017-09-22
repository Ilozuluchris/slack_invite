<!DOCTYPE html>
<html lang="en" xmlns:https="http://www.w3.org/1999/xhtml"> <!--todo:populate read me and test on heroku-->  <!--link to external file sheets -->
	<head>
		<title>Slack Invite</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS,Jquery and bootstrap js -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $.getJSON("settings.json", function (data) {
                console.log(data);
                $(".only").append(data['team_name']);
                $(".email_label").append("Enter email to join  " + data['team_name']);
            });
        </script>
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
            background: url(https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.mosta2bal.com%2Fvb%2Fbadeencache%2F3%2F23924wall.jpg&f=1) no-repeat center local;
            background-size: inherit;
        }
        #change_color{
            color: #000000;
        }
    </style>
	<body class="img-responsive" style="padding: 2%;margin: 2%;">
        <div class="show_stuff" style="height: auto;width: 50% ;margin-left: auto ;margin-right: auto ;padding-top: 20%">
            <div class="form-group" style="height: 100%;width: 100%">
                <p class="only" id="change_color"></p>
                <form>
                    <label class ="email_label" for="email" id="change_color"></label>
                    <div class="input-group">
                        <input id="email" type="text" class="form-control" name="email" placeholder="Email" req>
                    </div>
                    <button type="submit" class="btn btn-default" style="color:white; background-color: green">Oya,send me my invite</button>
                </form>

            </div>
        </div>
	</body>
</html>
<!-- todo: improve spacing between team name and more styling-->
