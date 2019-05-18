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

Setting up AWS EC2 Instance:

    1. Generate key pair .pem file from aws account.
    2. Open the Amazon EC2 console at https://console.aws.amazon.com/ec2/. 
    3. Choose Launch Instance.
    4. In Step 1: Choose an Amazon Machine Image (AMI), find an Amazon Linux AMI at the top of the list and choose Select.
    5. In Step 2: Choose an Instance Type, choose Next: Configure Instance Details.
    6. In Step 3: Configure Instance Details, choose Network, and then choose the entry for your default VPC. It should look something like vpc-xxxxxxx (172.31.0.0/16) (default).
    7. Choose Subnet, and then choose a subnet in any Availability Zone.
    8. Choose Next: Add Storage.
    9. Choose Next: Tag Instance.
    10. Name your instance and choose Next: Configure Security Group.
    11. In Step 6: Configure Security Group, review the contents of this page, ensure that Assign a security group is set to Create a new security group, and verify that the inbound rule being created has the following default values. Type: SSH, Protocol: TCPPort Range: 22Source: Anywhere 0.0.0.0/
    12. Choose Review and Launch.
    13. Choose Launch.
    14. Select the check box for the key pair that you created, and then choose Launch Instances.
    15. Choose View Instances.
    16. Choose the name of the instance you just created from the list, and then choose Actions.
    17. Choose your instance from the list.
    18. On the Description tab, make sure that you have two entries listed next to security groups—one for the default VPC security group and one for the security group that you created when you launched the instance.
    19. Make a note of the values listed next to VPC ID and Public DNS. 


**Starting server for REST requests:**
    
    1. After creating EC-2 instance launch the instance and upload python code for REST Api to EC2.
    2. From local desktop cd to folder having python code (using folder name “flask” in this project)
    3. Download .pem file to local directory
    4. Run  sudo ssh -i "aws_flash_key.pem" ubuntu@ec2-34-203-203-222.compute1.amazonaws.com in terminal
    5. Server will ask for password, once connection is established find folder name Flask on server and “run sudo python3.py” which will then start server required for API request

**Deploying application to AWS**
    
    1. Open the Elastic Beanstalk console using this preconfigured link: console.aws.amazon.com/elasticbeanstalk/home#/newApplication?applicationName=tutorials&environmentType=LoadBalanced
    2. For Platform, choose the platform that matches the language used by your application.
    3. For Application code, choose Sample application.
    4. Choose Review and launch.
    5. Review the available options. When you're satisfied with them, choose Create app.
    6. Run zip ../laravel-default.zip -r * .[^.]* -x "vendor/*"

**To deploy a source bundle**
    
    1. Open the Elastic Beanstalk console.
    2. Navigate to the management page for your environment.
    3. Choose Upload and Deploy.
    4. Choose Choose File and use the dialog box to select the source bundle.
    5. Choose Deploy.
    6. When the deployment completes, choose the site URL to open your website in a new tab.
    7. After deployment set document root to /public on aws
    8. Make required changes in database.config file inorder to perform database queries on aws.
    9. Add following code in database.config 
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('RDS_HOSTNAME', '127.0.0.1'),
            'port' => env('RDS_PORT', '3306'),
            'database' => env('RDS_DB_NAME', 'forge'),
            'username' => env('RDS_USERNAME', 'forge'),
            'password' => env('RDS_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    10.  Deploy updated file again and run the application.


 




