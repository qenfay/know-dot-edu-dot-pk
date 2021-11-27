# know-dot-edu-dot-pk
Concerningly designed but decent overall (albeit not feature complete) website for MOOCS.

## Getting Started

### Dependencies

No dependencies to install. Just arrange a database server that uses MySQL and a server to host the webpages, so that server-side scripting like PHP can be used. 

### Set Up

1. Clone Repo
```
git clone https://github.com/qenfay/know-dot-edu-dot-pk.git
```
2. Run **ddl.sql** to initialise your database
3. Enter database access details in **config/congfig.php**

### Executing program

1. Access the homepage **index.php**

## Sample Log-In Details

The **ddl.sql** file also initialises a few sample accounts for testing. You can use the following to test different views implemented.

| Username       | Password | Account Type |
|----------------|----------|--------------|
| akendrickfan99 | jquery   | Student      |
| curieherself   | radium   | Teacher      |
| admin1         | admin    | Admin        |
| admin2         | admin    | Admin        |

## Authors

- Muhammad Shaafay Saqib (me!) [@qenfay](https://github.com/qenfay/))
- Talaal Yousaf Bajwa

## Room for Improvement
- Design could be greatly improved to be more modern and less simplistic
- Add actual course management features
- Group files of similar types in different folders for organised sense of heirarchy
- A more encapsulated way of implementing views

