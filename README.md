# RabbitMQ-PHP-Example

Just a small test setup to play around with RabbitMQ and PHP

## Local setup

### 1. Start needed docker containers

```bash
docker-compose up
```

### 2. Install composer packages

```bash
docker-compose exec consumer composer install
docker-compose exec producer composer install
```

### 3. Visit http://localhost:8080 and create messages

### 4. Check `consumer/var/messages.csv` for consumed messages

### 5. ?

### 6. Profit!
