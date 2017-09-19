# Automate Your Slack Invites

This automate your slack invite with curl using php.

This has only been tested on a linux server.

Visit https://api.slack.com/custom-integrations/legacy-tokens to generate a token for the team(slack workspace) you to invite people to.


OAuth tokens

Visit https://api.slack.com/apps and Create New App.



Click "Permissions".



In "OAuth & Permissions" page, select admin scope under "Permission Scopes" menu and save changes.


Click "Install App to Team"

Visit  https://slack.com/oauth/authorize?&client_id=CLIENT_ID&team=TEAM_ID&install_redirect=install-on-team&scope=admin+client in your browser and authorize it.

It authorizes the client permission. 
Otherwise, you can see {"ok":false,"error":"missing_scope","needed":"client","provided":"admin"} error.

Your CLIENT_ID could be found in "Basic Information" menu of your app page that you just install.

Your TEAM_ID could be found in https://api.slack.com/methods/team.info/test