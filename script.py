import requests
import json

# Sample data to send
data_to_send = {'key1': 'value1', 'key2': 'value2'}

# Laravel route URL
url = 'http://localhost:80/run-python-script'  # Update with your Laravel server URL

# Send POST request with JSON data
response = requests.post(url, json=data_to_send)

# Print the response
print(response.json())
