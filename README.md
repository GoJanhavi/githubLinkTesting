# githubLinkTesting

1. clone the repository
2. check composer.json for `
        "guzzlehttp/guzzle": "^6.3"` in require section, if not present then add it there and run command <code>composer install</code> in your IDE terminal at project location.
3. Set up your aws account for hosting and creating rest API [see instruction at bottom].
4. Set following variables to your .env file, where region is region of your aws account, for me it is "us-east-1"
<code>AWS_ACCESS_KEY_ID=
<br> AWS_SECRET_ACCESS_KEY=
<br>AWS_DEFAULT_REGION=us-east-1
<br> AWS_BUCKET=
</code>
 5. set up server to run the code, for example if using phpStorm IDE under run option from toolbar go to add/edit configuration to set up artisan server to launch browser at correct CLI..
 6. Run the code on server, and it's done. The code is up and running.
 
###### **AWS set up instructions**
