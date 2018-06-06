# base image
FROM node:9.6.1

# set working directory
RUN mkdir /usr/src/app
RUN chmod -R 755 /var/www/am-i-late/logs
USER $USER
WORKDIR /usr/src/app

# add `/usr/src/app/node_modules/.bin` to $PATH
ENV PATH /usr/src/app/node_modules/.bin:$PATH

# install and cache app dependencies
COPY client/package.json /usr/src/app/package.json
#RUN chown -R $USER /usr/src/app
RUN npm install --silent
#RUN npm install react-scripts@1.1.1 -g --silent

# start app
CMD ["make", "front-run"]