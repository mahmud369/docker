# docker
Practicing Docker from Novice to Expert.

## Reference Link(s)

### Install and Use Docker on Ubuntu 20.04
[https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04)

[https://medium.com/@miladev95/dockerizing-a-php-application-e3c756670336](https://medium.com/@miladev95/dockerizing-a-php-application-e3c756670336)

[https://alysivji.github.io/php-mysql-docker-containers.html](https://alysivji.github.io/php-mysql-docker-containers.html)

### Only installation commands (Ubuntu, Linux)
Run below commands One-by-one:
```bash
sudo apt update
```
```bash
sudo apt install apt-transport-https ca-certificates curl software-properties-common
```
```bash
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
```
```bash
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
```
Make sure you are about to install from the Docker repo instead of the default Ubuntu repo:
```bash
apt-cache policy docker-ce
```
Finally, install Docker:
```bash
sudo apt install docker-ce
```
Check status:
```bash
sudo systemctl status docker
```
(_Optional_) Install Docker Compose:
```bash
sudo apt install docker-compose
```

## A very simple Example
The following is a very simple example of, how to run a PHP project in a Docker container. [__NOTE__: The source code can be found in the '__basic_docker_php__' folder of this repository.]

### Create a 'Dockerfile':
Below is an example Dockerfile content for PHP 7.4 and Apache. Copy and save in a file named 'Dockerfile', in the desired application's directory.
```docker
# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP application code into the container
COPY . .

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

# Expose the port Apache listens on
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]
```

### Build the Docker Image:
Navigate to the application’s directory and run below command. Replace [image-name] with a suitable image name.
```bash
docker build -t [image-name] .
```

### Run the Docker Container:
Create and run a Docker container for the Docker image.
```bash
docker run -d -p 8082:80 <image-name-or-image-id>
```
Here, the container will start in detached mode (-d), maps port **8082** on your host to port **80** in the container. The desired PHP application should now be accessible at **http://localhost:8082** in the web browser.


## Basic commands
Check all containers
```bash
sudo docker ps -a
```

Check only running containers
```bash
sudo docker ps
```

Check only stopped containers
```bash
sudo docker ps --filter "status=exited"
```
_- OR -_
```bash
sudo docker ps -f "status=exited"
```

Stop a running Docker container
```bash
sudo docker stop [container-id]
```

Start an exited(stopped) Docker container
```bash
sudo docker start [container-id]
```

Remove one or more Docker container(s):
```bash
sudo docker rm [container-id-1] [container-id-2] ...
```

Remove one or more Docker image(s):
```bash
sudo docker rmi [image-id-1] [image-id-2] ...
```

Access into Docker container shell
```bash
sudo docker exec -it [container-id] bash
```

Copy a file from host machine to Docker container
```bash
sudo docker cp foo.txt [container-id]:/foo.txt
```

Copy a file from Docker container to host machine
```bash
sudo docker cp [container-id]:/foo.txt foo.txt
```

Export a Docker image and physically save
```bash
sudo docker export [container-id] > docker_image_file.tar
```

(_Optional_) Compress to comparatively lower size file
```bash
gzip php_date_app_image.tar
```

Using 'docker-compose.yml' file, create Docker images and run respective Docker containers for multi container applications by running below command:
```bash
sudo docker-compose up -d
```
