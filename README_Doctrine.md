# WEBT | ADV | Doctrine Database Storage and Object Mapping

## Overview
The customer is very happy with your solution – as a developer it does however seem tedious to map your PHP classes to the database and vice versa. Also changes on the database have to be communicated between developers. You are looking into ORM to address some of those issues.

Apply this advanced user stories to a fitting CORE scenario of your choice.

## User Story 1
*As a Developer I want to install Doctrine ORM via composer, so that I can use it in my project.*

### Acceptance Criteria
- Doctrine ORM is required and installed via composer
- Doctrine ORM is ready to use in the project

## User Story 2
*As a Developer I want to write Entity Models for my main business objects, so that I can later create the database from them.*

### Acceptance Criteria
- Classes which represent the business objects exist
- The classes features the according properties
- The classes uses Doctrine ORM annotations to mark them as entities
- The classes use Doctrine ORM annotations to define the property settings

## User Story 3
*As a Developer I want to re-create the database with a new database name to make use of the new entity model, so that I don’t have to tend to the database manually in the future.*

### Acceptance Criteria
- The database is created with the help of Doctrine ORM
- The database structure is based on the entity models

## User Story 4
*As a Developer I want to insert demonstration data into the database, so that I can use this data in the view.*

### Acceptance Criteria
- The database is seeded with the help of https://github.com/doctrine/data-fixtures

## User Story 5
*As a Developer I want to perform all data operations with Doctrine ORM, so that I can work entity based.*

### Acceptance Criteria
- All instances of accessing the database (select, insert, delete, etc.) are using ORM

#### Links
https://my.skilldisplay.eu/en/skillset/358
