### Linux Security Overviews:
=> Enable Automatic Update
=> Create New User With Root Privilege (Don't SSH into Server as Root)
=> Always use SSH private key to login and Lock SSH login using password
=> Use Firewall
=> SSH login to a different port (change default ssh port)
=> Lock CURL after deployment (after all the testing)

### Linux Automatic Update:
1. Start with manually update, 1st update repository by `apt update` and then update the distribution by `apt dist-update`

2. Then install unattended-upgrades by `apt install unattended-upgrades`
3. To enable run `dpkg-reconfigure --priority=low unattended-upgrades`


### Create New User With `sudo` group:
1. Create new user by `adduser new_user_name` and fill the password prompt
2. Add user to the sudo group by `usermod -aG sudo new_user_name`
3. Logout and Log back in by `ssh new_user_name@whatever.ip.address` and provide password

### Use SSH key-pair to Login into the server & disable password login & change ssh port:
1. Create `.ssh` directory in the server's on user's home directory and give all permission to the user
    - `mkdir ~/.ssh && chmod 700 ~/.ssh`

2. Create private and public key on a local machine. `id_rsa` as private and `id_rsa.pub` as public key will be generated.
    - `ssh-keygen -b 4096` and choose a location to store if there are previously stored ssh key.

3. Copy the `id_rsa.pub` public key to the remote server on user's home/.ssh directory
    - windows => `scp $env:USERPROFILE/.ssh/id_rsa.pub new_user_name@whatever.server.address.ip:~/.ssh/authorized_keys`
    - mac => `scp ~/.ssh/id_rsa.pub new_user_name@whatever.server.address.ip:~/.ssh/authorized_keys`
    - linux `ssh-copy-id new_user_name@whatever.server.ip`

4. Check by logging back into server without password by `ssh new_user_name@whatever.server.ip`


### Lock the ssh password login and change the port:
1. Edit the `/etc/ssh/sshd_config` file
    - change prot form default 22 to anything else
    - make ssh ipv4 only, change `AddressFamily any` to `AddressFamily inet`
    - strict root login `PermitRootLogin no`
    - set `PasswordAuthentication no`
2. Restart ssh service by `sudo systemctl restart sshd`
3. Before logout, check ssh from a new terminal on the new port by `ssh new_user_name@server.ip -p newly_assigned_port`
4. Always ensure if everything working correctly

### Firewall Setting:
1. check all the open port on the server by `sudo ss -tupln`
2. install `UFW` as firewall (Un-Complected Firewall) by `sudo apt install ufw` check status by `sudo ufw status`
3. Before enabling allow all the necessary ports, most importantly `ssh` port by `sudo ufw allow ssh_port` (for web server port allow `sudo ufw allow 80/tcp`)
4. After allowing ssh and other port enable the firewall by `sudo ufw enable` and before quilting the ssh session, check if everything working

### Stopping Pinging:
1. Edit ufw's config file `/etc/ufw/before.rules`
    - add `A ufw-before-input -p icmp --icmp-type echo-request -j DROP` at `# ok icmp codes for INPUT` comment
2. And reload the firewall `sudo ufw reload` and restart the server by `sudo reboot`

### Docker Security
=> Don't execute the container as a root user.
    - after installing and configuring everything in a dockerfile, switch to another user to run the container. So do `USER selected_user` before execution. Usually every container base image comes with a predefined user, so switch to that user to run the container.

=> Use multi-stage built and a `distroless image`.
=> Use container optimized distribution (by google, etc)
=> scan images for vulnerability (tools like, anchore, clair, ect)
=> Don't install software blindly, might cause security leak