<?php
#Todo find out why token is been revoked and how to use normal token(not legacy token)
#Todo Get good background images
        $email = "yomi@dispostable.com";#$_GET["email"];

        $response= file_get_contents("settings.json");
        $response = utf8_encode($response);
        $json = json_decode($response,true);

        $team_url = $json["team_url"]; #put in slack team url like myslackteam.slack.com
        $token =  $json["token"];
		$real_url = "'".'https://' . $team_url .'/api/users.admin.invite'."'";
		$send = "'".'email='.$email.'&token='.$token.'&set_active=true'."'";

        $command = "curl -X POST ".$real_url." \
        --data " .$send ." \
        --compressed";


        $output = exec( $command);#this sends the api call
        echo $output;

        if (strpos($output, 'true') !== false) {
            echo "An invite link has been sent to you";
        }

        elseif (strpos($output, 'already_invited') !== false) {
            echo "You have already been invited.";
        }

        elseif (strpos($output, "token_revoked") !== false) {
            echo "The token used for authentication has been revoked,Contact the admin of the slack team";
        }
        else{
            echo "Some thing went wrong";
        }

