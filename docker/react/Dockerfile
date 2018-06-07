# base image
FROM node:9.6.1

# set working directory
RUN mkdir -p /usr/src/app
RUN mkdir -p /var/www/am-i-late/symfony
RUN chmod -R 777 /var/www
RUN chmod -R 777 /usr/src/app
WORKDIR /usr/src/app

# add `/usr/src/app/node_modules/.bin` to $PATH
ENV PATH /usr/src/app/node_modules/.bin:$PATH

# install and cache app dependencies
COPY client/package.json /usr/src/app/package.json
RUN npm install --silent

# start app
CMD ["make", "front-run"]