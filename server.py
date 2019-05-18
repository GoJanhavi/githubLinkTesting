from flask import Flask, request, jsonify
import git, os, shutil

app = Flask(__name__)

@app.route('/', methods=['GET'])
def testServer():
    return "Server is running good"

@app.route('/submit', methods=['GET'])
def register_patron():
    args = request.args
    # remoteURL = "https://github.com/laracasts/Email-Verification-In-Laravel"

    remoteURL = args['git']
    DIR_NAME = remoteURL.split('github.com/')[-1]
    DIR_NAME = DIR_NAME.split('/')[0] + '-' + DIR_NAME.split('/')[1]

    if os.path.isdir(DIR_NAME):
        shutil.rmtree(DIR_NAME)
    os.mkdir(DIR_NAME)

    repo = git.Repo.init(DIR_NAME)
    origin = repo.create_remote('origin', remoteURL)
    origin.fetch()
    origin.pull(origin.refs[0].remote_head)

    import subprocess
    subprocess.call(['sudo', './testProject.sh', DIR_NAME])

    a = open(DIR_NAME + "/results.txt", 'rb')
    lines = a.readlines()
    if lines:
        last_line = lines[-1]

    last_line = str(last_line)
    vals = last_line.split(',')

    response = {}
    response['Tests'] = vals[0].strip()
    response['Assertions'] = vals[1].strip()
    response['Errors'] = vals[2].strip()

    return jsonify(response)



@app.route('/runTest', methods=['GET'])
def testAll():
    #Run the cron job
    args = request.args
    DIR_NAME = args['folderName']

    import subprocess
    subprocess.call(['sudo', './testProject.sh', DIR_NAME])

    a = open(DIR_NAME+"/results.txt", 'rb')
    lines = a.readlines()
    if lines:
        last_line = lines[-1]

    return last_line


if __name__ == '__main__':
    app.run(debug=True)



"""

 
DIR_NAME = "temp"
REMOTE_URL = "https://github.com/hasinhayder/LightBulb.git"
 
if os.path.isdir(DIR_NAME):
    shutil.rmtree(DIR_NAME)
 
os.mkdir(DIR_NAME)
 
repo = git.Repo.init(DIR_NAME)
origin = repo.create_remote('origin',REMOTE_URL)
origin.fetch()
origin.pull(origin.refs[0].remote_head)
"""