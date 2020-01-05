# CakePHP Project  for Associations

A basic BoilerPlate template, build in CakePHP3 having the following core functionalities. 

```bash
1. Registration module:  

- Implemented client and server side validations.  

2. Admin - Login module  

- Login using Cake Authentication.  

- Implemented Client and server side validations.  

3. Admin - User Management  

4. Admin - Email Templates Management  

5. Admin - Articles/Pages Management

6. Admin - User /Profile Management

7. Admin - User /Deposit  Management

8. Admin - User /Nominee  Management
```

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [project_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server 
```

Then visit `http://localhost:8765` to see the welcome page.


## Configuration

Read and edit `config/app.php` and setup the `'Datasources'`, `'EmailTransport'` and any other
configuration relevant for your application.

Import database cake.sql


## Login Details

```bash
User: admin@localhost.com
Pass: 123456
```

#Permission 
- convention : function_name_controller
- check permission in everycontrollers function 

#Session user
$this->Auth->user()

#Image issue 
<?php echo $this->Html->image('profile/df.jpeg', ['alt' => 'Profile Img','class' => 'img-circle']); ?>


#common delet

users_1 equivalent to model/delete/1 -> Return should be json in controller
