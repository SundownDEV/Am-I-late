.PHONY: install api-start api-stop front-build front-run

install:
	composer install;
	cd client && npm install && cd -;

api-start:
	bin/console server:start *:8000;

api-stop:
	bin/console server:stop;

front-build:
	cd client && npm run build && cd -;

front-run:
	cd client && npm start;