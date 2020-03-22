.PHONY:help
help:
	@echo ""
	@echo " make install    runs container and install composer dependencies. (the docker container is removed when install finish)"
	@echo " make tests      runs a docker container and executes phpunit tests in /tests folder. (the docker container is auto removed when tests finishs)"
	@echo " make up         runs a docker container in background for use xdebug to debugging etc (the docker container is persitent. You can stoped/removed using 'make stop or make down' command)"
	@echo " make stop       stops and removes the docker container in background (you must be created the container using 'make up' command)"
	@echo " make down       same as make stop"
	@echo " make terminal   access from terminal in docker run container (you must be created the container using 'make up' command)"
	@echo ""

.PHONY:up
up:
	docker run --name my-kata-php7.4 -d --rm -ti -v $(shell pwd):/app drojilla/kata-php-fpm7.4:0.1.0 bash

.PHONY:terminal
terminal:
	docker exec -it my-kata-php7.4 bash

.PHONY:down
down:
	make stop

.PHONY:stop
stop:
	docker stop my-kata-php7.4

.PHONY:install
install:
	docker run --rm -v $(shell pwd):/app drojilla/kata-php-fpm7.4:0.1.0 composer install

.PHONY:tests
tests:
	docker run --rm -v $(shell pwd):/app drojilla/kata-php-fpm7.4:0.1.0 vendor/bin/phpunit
