FROM janitortechnology/ubuntu-dev

# Install dependencies.
RUN sudo apt-get update -q && sudo apt-get install -qy \
 php \
 composer \
 npm

# Download source code.
RUN git clone -b master https://github.com/SundownDEV/Am-I-late /home/user/Am-I-late
WORKDIR /home/user/am-i-late

# Configure the workspace.
ENV WORKSPACE /home/user/Am-I-late/

# Install dependencies.
RUN composer install \
 && cd client \
 && npm install

# Configure and build
RUN php bin/console doctrine:database:create \
 && php bin/console doctrine:migration:migrate

#COPY --chown=user:user supervisord.conf /tmp/supervisord-extra.conf
#RUN cat /tmp/supervisord-extra.conf | sudo tee -a /etc/supervisord.conf

EXPOSE 3000 8000