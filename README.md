### 🛡️ acs application

***

## ⚙️  Project setup


```
composer install
```

```
php artisan generate:key
```

```
php artisan passport:install
```

```
php artisan vendor:publish --tag=passport-migrations
```

```
php artisan migrate
```


```
php artisan db:seed
```

```
php artisan serve
```


.env

```
PASSPORT_LOGIN_ENDPOINT="http://example.test/oauth/token"
PASSPORT_CLIENT_ID=2
PASSPORT_CLIENT_SECRET= YOUR CLIENT SECRET
```




### ⚒️ Resources

- **[users]()**

- **[articles]()**

- **[register]()**

- **[login]()**

- **[refresh token]()**

- **[password reset]()**

- **[password reset confirmation]()**

- **[user]()**

- **[logout]()**

- **[manage articles]()**


### 📌 Routes

- **[GET : http://127.0.0.1:8080/users]()**

- **[GET : http://127.0.0.1:8080/articles]()**

- **[POST : http://127.0.0.1:8080/register]()**

- **[POST : http://127.0.0.1:8080/login]()**

- **[POST : http://127.0.0.1:8080/refresh_token]()**

- **[POST : http://127.0.0.1:8080/password/reset]()**

- **[POST : http://127.0.0.1:8080/password/reset/confirmation]()**

- **[GET : http://127.0.0.1:8080/user]()**

- **[POST : http://127.0.0.1:8080/logout]()**

- **[GET : http://127.0.0.1:8080/panel/writer/articles]()**
- **[POST : http://127.0.0.1:8080/panel/writer/articles]()**
- **[PUT : http://127.0.0.1:8080/panel/writer/articles/{id}]()**
- **[DELETE : http://127.0.0.1:8080/panel/writer/articles/{id}]()**



