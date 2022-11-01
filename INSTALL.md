# JMeter

## Installation

Install JAVA

    apt install openjdk-8-jre-headless

Download JMeter, unarchive and move to opt
    
    wget "https://www-eu.apache.org/dist/jmeter/binaries/apache-jmeter-5.1.1.tgz"
    tar zxvf apache-jmeter-5.1.1.tgz
    mv apache-jmeter-5.1.1 /opt/jmeter

## Server Tuning

### Increase RAM limit

Prepend to jmeter command

    JVM_ARGS="-Xms32g -Xmx32g" 

### Set CPU Governor to performance

    echo "performance" | sudo tee /sys/devices/system/cpu/cpu*/cpufreq/scaling_governor

### Tune sysctl settings

Open `/etc/sysctl.conf` and add:

    net.core.somaxconn=65000
    net.ipv4.ip_local_port_range=1024 64000
    net.ipv4.tcp_tw_reuse=1
    vm.overcommit_memory=1

After run `sysctl -p`

### Increase "open files" limit

    ulimit -a | grep "open files"

Modify soft/hard limits in `/etc/security/limits.conf`:

    *    soft nofile 64000
    *    hard nofile 64000
    root soft nofile 64000
    root hard nofile 64000

And logout/login

### Avoid "TIME_WAIT" limitations

    sudo sysctl -w net.ipv4.tcp_tw_reuse=1

## Transparent Huge Pages

Add to `/etc/rc.local`

```
if test -f /sys/kernel/mm/transparent_hugepage/enabled; then
    echo never > /sys/kernel/mm/transparent_hugepage/enabled
fi
```
    
__After these changes, reboot the machine__   

For more tuning: http://www.lognormal.com/blog/2012/09/27/linux-tcpip-tuning/
    

