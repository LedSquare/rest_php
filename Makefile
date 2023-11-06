include .env

# Чистая инициализация
init: docker-down-clear docker-build up

# Полностью обновить образы
update: docker-down-clear docker-pull docker-build-pull up

# Delete images by tag
delete-tag: docker-clear-images-tag
# Delete iages by names
delete-name: docker-clear-images-name


# shortcuts
up: docker-up
down: docker-down
restart: down up
build: docker-build
rebuild: down build up 

docker-build:
	docker compose build
docker-up:
	docker compose up -d
docker-down:
	docker compose down --remove-orphans
docker-down-clear:
	docker compose down -v --remove-orphans
docker-pull:
	docker compose pull
docker-clear-images-tag:
	docker rmi $$(docker images --format '{{.Repository}}:{{.Tag}}' | grep ':${TAG}') -f
docker-clear-images-name:
	docker rmi $$(docker images --format '{{.Repository}}:{{.Tag}}' | grep '${PROJ}') -f
composer-update:
	docker exec -it php composer update

