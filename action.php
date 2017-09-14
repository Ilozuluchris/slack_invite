<?php
        $email = "jon@gmail.com"; #$_POST['email'];
        $team_url = "academia-ng.slack.com"; #put in slack team url like myslackteam.slack.com
        $token = "insert_token"; #put in your token code
		$real_url = 'https://' . $team_url .'/api/users.admin.invite';
		$send = 'email='.$email.'&token='.$token.'&set_active=true';
        #Todo pass in command line arguments and use that for your page
        #todo put php and html code on the same page.
        if ($argc == 2)
        {
            echo  "passed in args";
            $token = $argv[1]; #for  security purposes argument is passed in via command line.
        }

        else
        {
            echo die("Pass in the right number of arguments");


        }
        $command = "curl -X POST".$real_url. "\
        --data" .$send."\
        --compressed";
        echo $command;
        #$output = shell_exec( $command);