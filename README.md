Vagrant PHPUnit and Selenium Box
=========================
*Vagrant Box for running PHPUnit_Selenium Test Cases*

This code will build a virtual machine to run automated web browser tests, using the [Selenium WebDriver](http://docs.seleniumhq.org/projects/webdriver/) and tests written as      [PHPUnit_Selenium Test Cases](http://phpunit.de/manual/4.0/en/selenium.html).

## Prerequisites - Vagrant  

### Step 1: Install Required Software

To get [Vagrant](http://www.vagrantup.com/downloads.html) running on your system, follow these steps:

Install VirtualBox - https://www.virtualbox.org/wiki/Downloads

Install Vagrant - http://docs.vagrantup.com/v2/installation/index.html

Run the command below to download and prepare a Ubuntu 12 box:
        
    vagrant box add precise32 http://files.vagrantup.com/precise32.box

To keep your Vagrant Box Utilities in sync with your Virtual Box Version, install the "vbguest plugin" with the following command: 

    vagrant plugin install vagrant-vbguest

#### Step 2: Verify Vagrant is Installed Correctly

Verify that you have at least version 1.4 of Vagrant. Check your Vagrant version on the command line by running:

    vagrant -v


Verify your vbguest plugin is installed with the following command:

    vagrant plugin list


You should see something like the text below in the list: 
`vagrant-vbguest (0.10.0)`

The output may direct you to update your plugin.  Follow the instructions on the screen to do so.

## Installation

### Step 1: Clone the Vagrant PHPUnit and Selenium Box Repo

    git clone git@github.com:seanbuscay/vagrant-phpunit-selenium.git

### Step 2: (Optional) Configure the Vagrant Box

Open the filed named `Vagrantfile` with a text editor

@todo- Complete this section

### Step 3: Start the Vagrant Box

Use the terminal to move into the directory into which you cloned in the repo.  For example:

    cd ~/workspace/vagrant-phpunit-selenium

Start the Vagrant Box with:

    vagrant up

It will take several minutes to configure the virtual machine when running this command for the first time. Subsequent runs will be much faster.  

After you have started the virtual machine, you may ssh into with the following command:

    vagrant ssh


You will be logged into the virtual machine and you should see a prompt like:

@todo

To exit out of the Vagrant ....

To suspend the ....

to resume...

## Usage

### A Quick Example Test

### Usage...
