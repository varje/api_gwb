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
`GET http://localhost/api_gwb/api.php?insert=product&name=<product_name>&price=<product_price>`  

#### Attribute
`GET http://localhost/api_gwb/api.php?insert=attribute&name=<attribute_name>&product_id=<product_id>`  


### Update

#### Product

`GET http://localhost/api_gwb/api.php?update=product&id=<product_id>&name=<product_name>&price=<product_price>`  
`GET http://localhost/api_gwb/api.php?update=product&id=<product_id>&name=<product_name>`  
`GET http://localhost/api_gwb/api.php?update=product&id=<product_id>&price=<product_price>`  

#### Attribute
`GET http://localhost/api_gwb/api.php?update=attribute&id=<attribute_id>&name=<attribute_name>&product_id=<product_id>`  
`GET http://localhost/api_gwb/api.php?update=attribute&id=<attribute_id>&name=<attribute_name>`  
`GET http://localhost/api_gwb/api.php?update=attribute&id=<attribute_id>&product_id=<product_id>`  


### Delete

#### Product
`GET http://localhost/api_gwb/api.php?delete=product&id=<product_id>`

#### Attribute
`GET http://localhost/api_gwb/api.php?delete=attribute&id=<attribute_id>`


### Retrieve

#### List of products

`GET http://localhost/api_gwb/api.php?products`

#### Searching products by name

`GET http://localhost/api_gwb/api.php?name=<product_name>`

#### Searching products by attribute

`GET http://localhost/api_gwb/api.php?attribute=<attribute_name>`



