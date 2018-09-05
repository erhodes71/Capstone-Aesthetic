#Test.py

import requests

data = {'user_name':'user&001'}
headers = {'Content-Type': 'application/json', 'Accept': 'application/json'}
url = "http://erhodes.oucreate.com/Cows/Test.php"
r = requests.post(url, headers=headers, json=data)

print(r)
