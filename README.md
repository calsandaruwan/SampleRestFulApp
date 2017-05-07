# RiverviewB2B
endpoints for mobile

# How to setup
- clone the repo
```sh
   $ git clone https://github.com/calsandaruwan/RiverviewB2B.git  
```
- go into blog folder
- composer install
```sh
   $ composer install  
```
- change db access info in .env file
- run migrations
```sh
   $ phpartisan migrate  
```
# Available Api

- sample {{baseUrl}} should looks like 
```sh
http://www.domain.com/api/
````


- Get all articles
```sh
{{baseUrl}}/articles
```

- Get article by id
```sh
- {{baseUrl}}/article/id
```

- Create article
```sh 
- {{baseUrl}}/article/create
```

- Edit article
```sh
- {{baseUrl}}/article/edit/id
```

- Delete article
```sh
- {{baseUrl}}article/delete/id
```

- Create author
```sh
- {{baseUrl}}author/create
```