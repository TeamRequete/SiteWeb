# Super Projet Web avec les coupains

## Tuto started

### Pour générer le docker
**../SiteWeb/**
`docker build . -t server_web`

### Pour run le docker
`docker run --rm -it -p 80:80 -v "[LIEN_RACINE_SITEWEB]:/var/www/html" server_web`
