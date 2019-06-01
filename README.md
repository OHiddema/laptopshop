# laptopshop
Laptopshop using PDO, PHP.

Goal:
Create a simple webshop to be used for to kinds of users:
- customers
- administrators

The database consists of one table: laptops.

Customers must be able to search for their perfect laptop, using criteria filters.
Administrators must be able to add, delete and update the data.

Steps to undertake:
[X] use the database created in the previous repo
[X] connect to the database
start with administrator interface:
   [X] create a form to insert a record into the table
   [X] create a page to delete record from the table
   [X] To be able to delete a record, we have first have to select a record.
   [X] To select a record, we first have to fetch the records.
   [X] Create a button for each record in HTML to delete the record.
   [X] Create a button for each record in HTML to update the record.
   [X] create a form to edit a record from the table.
   [X] perform update query

Administrator functionality now working (CRUD).

Next is the customer interface. Goal of this interface is to select the laptops based on the criteria the user sets. Like:
- Maximum price
- Minimum amount of memory
When the customer changes a criterion, the selection of laptops that match all criteria must be shown on the same page where the criteria are set. Therefore, we are going to use an AJAX call. The SQL statement must be built dynamiccally, based on the set criteria.
   [X] Create customer page
   [X] Create php document to filter laptops and return the result of the query as a HTML table to the customer page.

Extra: using JSON to transfer the selection criteria from the user page to the server. In this case. there is no real benifit for doing it this way, but just for practising using JSON.


