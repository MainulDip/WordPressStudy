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

### DHCP (Dynamic Host Configuration Protocol) for Routing:
DHCP (Dynamic Host Configuration Protocol) is a network management protocol used to dynamically assign an IP address to any device, or node, on a network so it can communicate using IP. DHCP automates and centrally manages these configurations rather than requiring network administrators to manually assign IP addresses to all network devices. DHCP can be implemented on small local networks, as well as large enterprise networks.

DHCP assigns new IP addresses in each location when devices are moved from place to place, which means network administrators do not have to manually configure each device with a valid IP address or reconfigure the device with a new IP address if it moves to a new location on the network.

### Networking Protocols:
These protocols can be categorized into 3 main types
1. Network Communication Protocols: 

    - http => allows communication between a server and browser

    - tcp and ip (tpc/ip): TCP is a reliable, connection-oriented protocol that helps in the sequential transmission of data packets to ensure data reaches the destination on time without duplication. IP contains addressing and control information to deliver packets across a network. It works along with TCP. 

    - UDP (User Datagram Protocol), by its specification, data are sent directly to a target computer, without establishing a connection first, udp doesn't ensure data integrity like tcp and it is faster than tpc. It is used for video playback or DNS lookups. UDP can also cause packets to become lost in transit — and create opportunities for exploitation in the form of DDoS attacks. [Socket.IO use both tcp and udp | WebRTC uses primarily udp]

    - FTP (File transfer protocol)

2. Network Security Protocols: 

    - Secure File Transfer Protocol (SFTP)
    - Hyper-Text Transfer Protocol Secure (HTTPS)
    - Secure Socket Layer (SSL)

3. Network Management Protocols:

    - Simple Network Management Protocol (SNMP)
    - Internet Control Message Protocol (ICMP)
    - Dynamic Host Configuration Protocol (DHCP)

https://www.solarwinds.com/resources/it-glossary/network-protocols

### OSI model layers:
the Open Systems Interface (OSI), demonstrates how computer systems communicate over a network. This seven-layer model visualizes the communication process between two network devices across seven layers.

1. Layer 1 - `Physical Layer `=> enables physical connection between the two network devices.  It facilitates data transmission in bits while managing bit rate control,  cabling or wireless technology, voltage, and topography, among other things.

2. Layer 2 - `Data Link Layer` => helps create and terminate a connection by breaking up packets into frames and transmitting them from source to destination. This layer fixes problems generated due to damaged, duplicate, or lost frames.

3. Layer 3 - `Network Layer` => This layer fulfills two primary functions. The first function consists of splitting up segments into network packets and putting the packets back together at the receiver’s end. The second ensures the transmission of packets across the physical network via the most optimal route.

4. Layer 4 - `Transport Layer` => breaks data into “segments” and is reassembled on the receiving end. Manages data control flow and monitors errors.

5. Layer 5 - `Session Layer` => establishes a communication channel called a session between the devices that want to exchange data.

6. Layer 6 - `Presentation Layer` => This layer arranges data for the application layer by ensuring the correct representation concerning information syntax and semantics. It also controls file-level security by defining how the connected devices should encrypt and compress data to provide accurate data transmission at the receiver’s end.

7. Layer 7 - `Application Layer` => The top layer of the network, the application layer, is accessed by end-user software such as web browsers and email clients. Protocols at this layer allow applications to send and receive information and present easy-to-understand and relevant data to users.

https://www.solarwinds.com/resources/it-glossary/network-protocols.

### Docker networking:
`ip address show` will show all the networks in the os 
`sudo docker network ls` will show all the available networks created by docker. `DRIVER` means the `Network Type`. There are 7 Driver/Network-Type in Docker, `bridge, host, null, etc`

`bridge` is the default network for docker. If a deployed container has no specified network, it gets the bridge default network. 

* When container are deployed (without specifying any network), same number of virtual switch are created (as ethernet interface) which connects/links those containers with the default bridge network. Each container has it's own virtual ethernet interface, which is used for connecting with the switch. `bridge link` cmd will show all the linked networks (if any).

* all container connected to a same network can communicate with each other. This can be checked by hopping into a container and ping other ips. all connected containers in a network can be seen by `docker inspect network-name` cmd.

* but unless, a container is not exposing a prot with the host machine, it will not be accessible. Even-if without exposing a port, a container can connect to the internet through the network (every container is assigned with a network). 

* the default bridge network uses the localhost ip.

### Docker Network Types:
`docker network create custom_network` will create a bridge network with the name. This will isolate the custom_network with the any other network. Container form another network cannot communicate with each other unless configured.

`host` network => Its the network with is directly connected with local host.

`macvlan` network (bridge mode) => this network is directly mapped with the physical host network and is used to connect containers directly with physical network. Ie, router assign its own ip through DHCP. `docker network create -d macvlan --subnet 10.7.1.0/24 --gateway 10.7.1.3 -o parent=enp0s3 network_name`

```sh
docker network create -d macvlan \ # create network type macvlan
--subnet 10.7.1.0/24 \ # define the subnet
--gateway 10.7.1.3 \ # define the gateway, if not may be done by DHCP, which may create conflict as Docker and Router can assign different DHCP ip
-o parent=enp0s3 \ # map with the host's physical device
network_name 
```


`macvlan` network (802.1q mode):
`ipvlan` network (l2 mode, layer 2):
`ipvlan` network (l3 mode, layer 3): host as router
`overlay` network : for docker swarm, where there are multiple host
`none` network : 