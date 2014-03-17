Vagrant PHPUnit and Selenium Box
=========================
*Vagrant Box for running PHPUnit_Selenium Test Cases*

This code will build a virtual machine to run automated web browser tests, using the [Selenium WebDriver](http://docs.seleniumhq.org/projects/webdriver/) and tests written as      [PHPUnit_Selenium Test Cases](http://phpunit.de/manual/4.0/en/selenium.html).

## Installation

*Prerequisites: Vagrant should be installed and working on your system.  If it is not, see: [Prerequisites - Vagrant](#prerequisites---vagrant) section below.*

#### Step 1: Clone the Vagrant PHPUnit and Selenium Box Repo

    git clone git@github.com:seanbuscay/vagrant-phpunit-selenium.git

#### Step 2: (Optional) Configure the Vagrant Box

Open the filed named `Vagrantfile` with a text editor.  Change the configurations as desired.  See http://docs.vagrantup.com/v2/vagrantfile/index.html for further information.

##### Increase memory

Modify the following line to increase the amount of memory used by the virtual machine.

    v.customize ["modifyvm", :id, "--memory", 1024] #1024mb memory
    
##### Speed up folder sharing

@todo - To implement 

If your host operating system supports [NFS](http://en.wikipedia.org/wiki/Network_File_System_%28protocol%29) (most Macs and Linus systems do), then you can take advantage of Vagrant's support for [synced folders backed by NFS](http://docs.vagrantup.com/v2/synced-folders/nfs.html).  To enable NFS support uncomment the following line:

    :nfs => true

#### Step 3: Start the Vagrant Box

Use the terminal to move into the directory into which you cloned the repo.  For example:

    cd ~/workspace/vagrant-phpunit-selenium

Start the Vagrant Box with:

    vagrant up

It will take several minutes to configure the virtual machine when running this command for the first time. Subsequent runs will be much faster.  

## Usage

#### Login 

After you have started the virtual machine, you may ssh into the virtual machine with the following command:

    vagrant ssh

You will be logged into the virtual machine and you should see a prompt like: `vagrant@selbox:~$`

#### Quick Start

##### Run example WebTest Case

After you [login](#login), with `vagrant ssh` and see the Vagrant Box prompt `vagrant@selbox:~$`, move to the examples directory and run the "WebTest" test case.

    cd ~/examples
    phpunit WebTest

The example test case, "WebTest" will run two tests, using two browser sessions; one in Google Chrome and the other in Firefox. 

The first test, titled "testTitle" will open each web browser and goto google.com.  In each browser, the test will assert the page title should be, "Google".   This test should pass in both web browsers.

The second test, titled "testFail" will open each web browser and goto google.com.  In each browser, the test will assert the page title should be, "Gogle".  Note the misspelling.  Because the page title is not actually "Gogle" the test will fail in both browsers. 

Your terminal output should include something like the following at the beginning of the test case's output:

    PHPUnit 4.0.7 by Sebastian Bergmann.

    .E.E

Each character place is a very short summary of the results of the tests.  The periods show two tests passed and the letter "E" shown twice shows two tests failed.  For more information see: [Chapter 3. The Command-Line Test Runner](http://phpunit.de/manual/current/en/textui.html)

The failed tests will also include details about what failed.  You should see a couple of entries of text like the following:

```
Failed command: assertTitle('Gogle')
Failed asserting that 'Google' matches PCRE pattern "/^Gogle$/".

/home/vagrant/WebTest.php:34
/home/vagrant/WebTest.php:34

Caused by
Failed command: assertTitle('Gogle')
Failed asserting that 'Google' matches PCRE pattern "/^Gogle$/".
    
```
 
Upon a test failure, phpunit_selenium will snap a screenshot of what the browser displays at the point of failure.  Access the examples directory from your host os.  You should see two new images with screenshots of the Google home page.

##### Run example WebTest2 Case

    cd ~/examples
    phpunit WebTest2

The example test case, "WebTest2" will run one test in FireFox using the PHPUnit_Extensions_Selenium2TestCase test case with the Selenium WebDriver API.

The test titled "testTitle" will open FireFox and goto google.com.  The test will assert the page title should be, "Google".   This test should pass.  You should see output similar to the following:

```
vagrant@selbox:~$ phpunit WebTest2
PHPUnit 4.0.7 by Sebastian Bergmann.

.

Time: 5.07 seconds, Memory: 4.50Mb

OK (1 test, 1 assertion)
```

#### Running Tests

##### Put Tests in the Shared Folder

The Vagrant Box shares a folder with your ([host](http://en.wikipedia.org/wiki/Host_machine)) operating system.  This shared folder is found within the cloned Vagrant PHPUnit and Selenium Box repo.  It is titled, `share`.  Put your test cases within a directory in this shared folder.  For example, your vagrant box lives at: `~/workspace/vagrant-phpunit-selenium`, and you have a set of tests for "Client Site A", then put your tests in `~/workspace/vagrant-phpunit-selenium/share/siteA`.

##### Run the Tests in the Vagrant Box

[Login](#login) to your running Vagrant Box.  

Change into the your tests directory.  From the example above, your tests directory would be `~/siteA`.  Now, run your tests using the [Command-Line Test Runner for PHPUnit](http://phpunit.de/manual/current/en/textui.html).

#### Troubleshooting

After Vagrant has been halted or suspended, it may start back up without restarting  Selenium and the Xvfb server.  The result will be that PHPUnit may skip some of your web tests. You'll know if tests are being skipped if you see this message after running your tests: `OK, but incomplete, skipped, or risky tests!`  To fix this issues, run the following command within your Vagrant Box:

    sh selup.sh
    
 Let the command run until you see a line of asterisks like: `*************************`
 
 Then hit return/enter in your terminal.  You may see a number of error messages in the terminal after you hit enter.  Wait a couple of seconds and then hit enter again.  
 
 You can verify the server is running correctly by running the example WebTest2 Case as described above.  
 
 Note: This issue will be addressed in a follow-up release.

## Roadmap 

@todo

1.  Add Jenkins server
2. 

## Prerequisites - Vagrant  

#### Step 1: Install Required Software

To get [Vagrant](http://www.vagrantup.com/downloads.html) running on your system, follow these steps:

1. Install VirtualBox - https://www.virtualbox.org/wiki/Downloads
2. Install Vagrant - http://docs.vagrantup.com/v2/installation/index.html
3. Run the command below to download and prepare a Ubuntu 12 box: `vagrant box add precise32 http://files.vagrantup.com/precise32.box`
4. *(Optional)* To keep your Vagrant Box Utilities in sync with your Virtual Box Version, install the "vbguest plugin" with the following command: ` vagrant plugin install vagrant-vbguest`

#### Step 2: Verify Vagrant is Installed Correctly

Verify that you have at least version 1.4 of Vagrant. Check your Vagrant version on the command line by running:

    vagrant -v

Verify your vbguest plugin is installed with the following command:

    vagrant plugin list


You should see something like the text below in the list: 
`vagrant-vbguest (0.10.0)`

The output may direct you to update your plugin.  Follow the instructions on the screen to do so.

## Current Versions

@todo
