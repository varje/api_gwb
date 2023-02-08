# Api_GWB

API for retrieving, updating, creating and deleting data.

# Documentation

## API calls

### Data types 
`<product_name>  VARCHAR`  
`<product_price>  FLOAT`  
`<attribute_name>  VARCHAR`  
`<product_id>  INT`  
`<attribute_id>  INT`  

### Create

#### Product
`POST http://localhost/api_gwb/products/create.php`  
`{"name":<product_name>, "price":<product_price>}`  

#### Attribute
`GET http://localhost/api_gwb/api.php?insert=attribute&name=<attribute_name>&product_id=<product_id>`  


### Update

#### Product

`PUT http://localhost/api_gwb/products/update.php`  
`{"id":<product_id,"name":<product_name>, "price":<product_price>}`   

#### Attribute
`GET http://localhost/api_gwb/api.php?update=attribute&id=<attribute_id>&name=<attribute_name>&product_id=<product_id>`  
`GET http://localhost/api_gwb/api.php?update=attribute&id=<attribute_id>&name=<attribute_name>`  
`GET http://localhost/api_gwb/api.php?update=attribute&id=<attribute_id>&product_id=<product_id>`  


### Delete

#### Product
`DELETE http://localhost/api_gwb/products/delete.php`  
`{"id":<product_id>}`  

#### Attribute
`GET http://localhost/api_gwb/api.php?delete=attribute&id=<attribute_id>`


### Retrieve

#### List of products

`GET http://localhost/api_gwb/retrieve.php?products`

#### Searching products by name

`GET http://localhost/api_gwb/retrieve.php?name=<product_name>`

#### Searching products by attribute

`GET http://localhost/api_gwb/retrieve.php?attribute=<attribute_name>`



