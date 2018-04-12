dev: ## Creates and starts the docker containers with development settings
	docker-compose -f docker-compose.yml -f dev.yml up -d
	docker-compose ps

dev-debug: ## Creates and starts the docker containers with development settings
	docker-compose -f docker-compose.yml -f dev.yml up
	docker-compose ps

down:
	docker-compose down

build:
	docker-compose build

composer-api:
	docker-compose up api-composer
composer-web:
	docker-compose up web-composer
