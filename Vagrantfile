# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.provider 'virtualbox' do |vb|
      vb.cpus = 1
      vb.memory = 1024
      vb.name = "PHPTestMySQL"
   end
   config.vm.define "PHPTestMySQL"
   config.vm.hostname = "PHPTestMySQL"
   config.vm.network 'private_network', ip: '192.168.93.25'
  config.vm.post_up_message = "Provisioning mysql database"
  config.vm.provision 'shell', path: './install.sh'
end