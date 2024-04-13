### Overviews:

### ip ranges (ipv4 slider block):
127.0.0.0/24 => only last 8 bit is changeable (First 24 bit is locked) => can be 127.0.0.255
127.0.0.0/16 => last 16 bit is changeable (First 16 bit is locked) => can be 127.0.255.255
127.0.0.0/8 => last 24 bit is changeable (First 8 bit is locked) => can be 127.255.255.255


### Subnet:
https://www.cloudflare.com/learning/network-layer/what-is-a-subnet/
https://networkengineering.stackexchange.com/questions/17439/how-does-the-router-know-how-to-route-the-packets-to-my-terminal
Resources (ec2 compute instance, etc) are behind `subnet`

- Public Subnet => These ips are publicly accessible 
- Private Subnet => These are internal non-publicly accessible ips

### Private Cloud vs Public Cloud vs VPC:
When a company manage their own infrastructure, that is called private cloud. And when 3rd party companies provide cloud service, that is considered `public cloud`.

### VPC vs VPS:

### VPC's Public vs Private Subnet:

https://aws.amazon.com/compare/the-difference-between-public-cloud-and-private-cloud/
vps vs vpc : https://www.techtarget.com/searchitoperations/tip/Understand-the-differences-between-VPS-vs-VPC
https://stackoverflow.com/questions/59067920/when-to-use-public-subnet-vs-private-subnet
https://stackoverflow.com/questions/75621070/hosting-my-docker-container-in-public-or-private-subnet