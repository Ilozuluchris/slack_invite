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

Next edit  settings.json with the right values

To get your team url 
1) If you are using the application click on the arrow beside your team name,that should bring up a drop down list.
2) If you are using the website just look at the adress bar of your browser.
Note team urls end with .slack.com

The token is the api token you just received,you cannot use a token gotten for a team(team X) for a different team(team Y)

The team name is the name you want that appears on the index page.This lets users know the name of the team they want to get an invite for.
