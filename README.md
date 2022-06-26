## GraphQL em Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


### 🚀 Tecnologias Utilizadas


- Laravel v9.0
- PHP v8.0
- [rebing/graphql-laravel 8.3] (https://github.com/rebing/graphql-laravel)
- MySql 

## Alguns exemplos de mutation (insert) e query (consulta)

```
mutation insertPhone{
  createPhone(number: "123456789", active: true, user_id: 4){
    id
  }
}
```

```
{
 	users{
        id,
        name,
        email, 
        phones{
            number,
            active  
        }
    }
}
```

