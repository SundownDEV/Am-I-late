.PHONY: install api-start api-stop front-watch front-build front-build-prod

install:
	composer install;
	npm install;

api-start:
	bin/console server:start;

api-stop:
	bin/console server:stop;

front-watch:
	./node_modules/.bin/encore dev --watch

front-build:
	./node_modules/.bin/encore dev

front-build-prod:
	./node_modules/.bin/encore production

front-start:
	npm start