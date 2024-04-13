### Overviews:

### ip ranges (ipv4 slider block):
127.0.0.0/24 => only last 8 bit is changeable (First 24 bit is locked) => can be 127.0.0.255
127.0.0.0/16 => last 16 bit is changeable (First 16 bit is locked) => can be 127.0.255.255
127.0.0.0/8 => last 24 bit is changeable (First 8 bit is locked) => can be 127.255.255.255


### Subnet:
https://www.cloudflare.com/learning/network-layer/what-is-a-subnet/
https://networkengineering.stackexchange.com/questions/17439/how-does-the-router-know-how-to-route-the-packets-to-my-terminal
Resources (ec2 compute instance, etc) are behind `subnet`