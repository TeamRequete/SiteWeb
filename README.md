# Super Projet Web avec les coupains

## Tuto start

### Pour générer le docker, à la racine tappé :
`docker build . -t server_web`

### Pour run le docker :
`docker run --rm -it -p 80:80 -v "[LIEN_RACINE_SITEWEB]:/var/www/html" server_web`

## Tuto connect

### Recupèrer l'ID :

`docker ps -a`

### Connection :

`docker exec -it [ID] /bin/bash`
