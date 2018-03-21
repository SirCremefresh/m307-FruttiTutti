
# m307-FruttiTutti


## Database FruttiTutti
### Table fruit
| name                   | type           | Not Null  | Primary Key   | Auto Increment  |
| ---------------------- |----------------| --------- | ------------- | --------------- |
| fruitId 🔑             | int(11)        | True      | True          | True            |
| name                   | varchar(255)   | True      | False         | False           |


### Table quantityCategory
| name                   | type           | Not Null  | Primary Key   | Auto Increment  |
| ---------------------- |----------------| --------- | ------------- | --------------- |
| quantityCategoryId 🔑  | int(11)        | True      | True          | True            |
| description            | varchar(255)   | True      | False         | False           |
| additionalDays         | varchar(255)   | True      | False         | False           |
| totalDays              | varchar(255)   | True      | False         | False           |

### Table parchOrder
| name                   | type           | Not Null  | Primary Key   | Auto Increment  |
| ---------------------- |----------------| --------- | ------------- | --------------- |
| parchOrderId 🔑        | int(11)        | True      | True          | True            |
| forename               | varchar(255)   | True      | False         | False           |
| lastname               | varchar(255)   | True      | False         | False           |
| email                  | varchar(255)   | True      | False         | False           |
| phone                  | varchar(255)   | False     | False         | False           |
| orderDate              | timeStamp      | False     | False         | False           |
| isDone                 | tinyInt(1)     | False     | False         | False           |
| fruit_fk 🗝            | varchar(255)   | True      | False         | False           |
| quantityCategory_fk 🗝 | varchar(255)   | True      | False         | False           |

