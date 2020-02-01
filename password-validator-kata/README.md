# Goal
We want to ensure that our users' passwords have the following rules:

   - Have more than 8 characters
   - Contains at least a capital letter
   - Contains at least a lowercase
   - Contains at least number
   - Contains at least an underscore

# Key
This kata shows the importance of:

  * Selecting good examples

  * Selecting the test order
  
  * Having good assertions (testing only one thing and being always true)

 ## Commands To Run docker 
 
 **make install** =>    runs container and install composer dependencies. (the docker container is removed when install finish)
 
 **make tests** =>      runs a docker container and executes phpunit tests in /tests folder. (the docker container is auto removed when tests finishs)
