# Mini-CRM
 ![alt text](https://github.com/ahmedwael49674/Mini-CRM/blob/master/diagrams/view.png)
## Summary
It's a system that allows store companies and employees with: 
- Complete CRUD functionality over both Companies and Employees.
- validation function over all the system inputs.
- pagination for showing Companies/Employees list.
- Email notification for the account owner when the account used to create a new company.
- The ability to switch between (English, Arabic ) languages considering the direction (ltr, rtl).
- PHPUnit test over all the CRUD functionality of both Companies and Employees.

## Used technologies
1. Laravel
2. adminbit
3. sweetalert

## Description
### Sequence  diagram 
 ![alt text](https://github.com/ahmedwael49674/Mini-CRM/blob/master/diagrams/Sequence%20Diagram.jpg)
1. User creates a new company.
2. Validator receive the request if there is validation error display it to the user else pass the request to company controller.
3. CompanyController sends the data to the database.
4. CompanyController fire NewUserCreated event with the new company data.
5. NewUserCreated event shares the new company data with SendNotificationEmail listener.
6. SendNotificationEmail listener call NewCompanyCreated mail
7. NewCompanyCreated mail sends mail to the auth with the new company data.
8. CompanyController returns to the user with success message.

### ERD  diagram 
 ![alt text](https://github.com/ahmedwael49674/Mini-CRM/blob/master/diagrams/ERD.png)
 1. users: store all the user's data within the system.
 2. companies: store all the company data.
 3. employees: store employees data with foreign company_id which is a reference to companies table.
 
## How to run?

1. git clone the project
2. composer install
3. create the database
4. copy .env.exmple to .env and change database username and password
5. run the migrations (php artisan migrate)
6. run the seeder (php artisan db:seed)
7. run the project (php artisan serve)

Note: to active mail function try Mailgun or Mailtrap copy the account credentials to .env file
