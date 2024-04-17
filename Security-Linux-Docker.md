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


### Lock the ssh password login:


### Docker Security