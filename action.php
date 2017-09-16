<?php
        #todo: make php output index php then make it run from command line argument
        $email = "tessy@dispostable.com";#$_GET["email"];
        $team_url = "academia-ng.slack.com"; #put in slack team url like myslackteam.slack.com
        $token = "xoxp-150107414595-150872153463-240044223985-701b34872ac74e7cc7e2f358deec9238"; #put in your token code
		$real_url = "'".'https://' . $team_url .'/api/users.admin.invite'."'";
		$send = "'".'email='.$email.'&token='.$token.'&set_active=true'."'";
        #Todo pass in command line arguments and use that for your page
        #todo put php and html code on the same page.
        $command = "curl -X POST ".$real_url." \
        --data " .$send ." \
        --compressed";

/*
curl -X POST 'https://YOUR-SLACK-TEAM.slack.com/api/users.admin.invite' \
--data 'email=EMAIL&token=TOKEN&set_active=true' \
--compressed
*/
        echo $command;
        $output = exec( $command);#this sends the api call
        echo $output;