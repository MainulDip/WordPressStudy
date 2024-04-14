### Overviews:

### ip ranges (ipv4 slider block):
127.0.0.0/24 | Class A network => only last 8 bit is changeable (First 24 bit is locked) => can be 127.0.0.255
127.0.0.0/16 | Class B network => last 16 bit is changeable (First 16 bit is locked) => can be 127.0.255.255
127.0.0.0/8 | Class C network => last 24 bit is changeable (First 8 bit is locked) => can be 127.255.255.255


### Subnet:
A subnet, or subnetwork, is a network inside a network. Subnets make networks more efficient. Through subnetting, network traffic can travel a shorter distance without passing through unnecessary routers to reach its destination.
https://www.cloudflare.com/learning/network-layer/what-is-a-subnet/
https://networkengineering.stackexchange.com/questions/17439/how-does-the-router-know-how-to-route-the-packets-to-my-terminal

On a VPC, Resources (ec2 compute instance, etc) are are always kept behind `subnet`. Usually when there are multiple server instances, a Load Balancer use public subnet to communicate with external connection and all server instances are behind private subnet. 

For single server instance, there is no need of a load balancer, hence no need for a private subnet. The server will be on public subnet. For security (also with VPS), Use a Security Group to restrict access to the minimum ports that should be accessible (eg port 80, 443) and also the ability to login (but restrict that to only your IP address)
- Public Subnet => These ips are publicly accessible 
- Private Subnet => These are internal non-publicly accessible ips

### Private Cloud vs Public Cloud vs VPC:
When a company manage their own infrastructure, that is called private cloud. And when 3rd party companies provide cloud service, that is considered `public cloud`.

### VPC vs VPS:
VPS uses a fixed portion of a server with fixed resources.

VPC can manage large numbers of virtual machines and are not limited to a single, fixed-resource server. Users are not bound by the limitations of the underlying hardware. Within VPC, spawning multiple VPS or Shutting off can be done programmatically on-demand (elasticity). 
### VPC's Public vs Private Subnet:
Usually as VPC manages multiple VMs, there are Public Subnet IPs to be accessible publicly and Private Subnet IPs to communicate between internal services privately. Those private subnet ips are not accessible from outside.

https://aws.amazon.com/compare/the-difference-between-public-cloud-and-private-cloud/
vps vs vpc : https://www.techtarget.com/searchitoperations/tip/Understand-the-differences-between-VPS-vs-VPC
https://stackoverflow.com/questions/59067920/when-to-use-public-subnet-vs-private-subnet
https://stackoverflow.com/questions/75621070/hosting-my-docker-container-in-public-or-private-subnet