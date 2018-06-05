.PHONY: install api-start api-stop front-build front-run

install:
	composer install;
	npm install;

api-start:
	bin/console server:start *:8000;

api-stop:
	bin/console server:stop;

front-build:
	cd client && npm run build;

front-run:
	npm start;