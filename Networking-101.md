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


### Gateways:
A Gateway allows to communicate between two networks with different transmission protocols. All traffic incoming/outgoing must have to passes through a gateway. 

A router is the most common and well-known type of gateway, connecting home or business networks with the outside open world internet. There are a variety of other types of networking gateways, including web application firewalls, cloud storage gateways, API gateways, IoT gateways, media gateways, email security gateways and voice over IP gateways, among others. 

Microsoft Windows, the Internet Connection Sharing feature allows a computer to act as a gateway by offering a connection between the Internet and an internal network

For VPC's, a `internet gateway` Gateways connect VPC's public subnet with external network, like public internet. the `internet gateway` have to be attached with the vpc and the vpc's router through `route table`

`internet gateway` - a vpc is required to have and attached an internet gateway to be accessible
`transit gateway`
`NAT gateway` - `Network Address Translation Gateway` is usually used with a private VPC to restrict incoming and only allow outgoing access. 

### DHCP (Dynamic Host Configuration Protocol):
DHCP (Dynamic Host Configuration Protocol) is a network management protocol used to dynamically assign an IP address to any device, or node, on a network so it can communicate using IP. DHCP automates and centrally manages these configurations rather than requiring network administrators to manually assign IP addresses to all network devices. DHCP can be implemented on small local networks, as well as large enterprise networks.

DHCP assigns new IP addresses in each location when devices are moved from place to place, which means network administrators do not have to manually configure each device with a valid IP address or reconfigure the device with a new IP address if it moves to a new location on the network.

### Networking Protocols:
https://www.solarwinds.com/resources/it-glossary/network-protocols

### OSI model layers:
https://www.solarwinds.com/resources/it-glossary/network-protocols

### Docker networking:
`ip address show` will show all the networks in the os 
`sudo docker network ls` will show all the available networks created by docker. `DRIVER` means the `Network Type`. There are 7 Driver/Network-Type in Docker, `bridge, host, null, etc`

`bridge` is the default network for docker. If a deployed container has no specified network, it gets the bridge default network. 

* When container are deployed (without specifying any network), same number of virtual switch are created (as ethernet interface) which connects/links those containers with the default bridge network. Each container has it's own virtual ethernet interface, which is used for connecting with the switch. `bridge link` cmd will show all the linked networks (if any).