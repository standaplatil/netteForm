## Požadavky

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Instalace

1. Naklonujte si tento repozitář:
   ```bash
   git clone https://github.com/yourusername/nette_form.git
   cd netteForm
   cd .docker/
   
2. Vyvořte potřebné kontejnery pomocí Docker Compose:
    ```bash
    docker-compose build
   
Pokud bude problém s composerem je možné že bude potřeba ve složce ./docker/ 
vytvořit soubor .env dle .env.example a do něj následně doplnit github token místo TODO.
   
## Spuštění

1. Spusťte všechny služby pomocí Docker Compose:
    ```bash
    docker-compose up -d

## Služby:

### PHP (Nette aplikace)
- dostupné na http://localhost
- Přihlašovací údaje do administrace:
    - username: admin
    - heslo: admin

### phpMyAdmin
- dostupné na http://localhost:8080
- Přihlašovací údaje:
    - Uživatel: user
    - Heslo: user