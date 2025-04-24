Book System API
The Book System API is a RESTful API built with Laravel 12 for managing books, authors, and categories. It follows SOLID principles and OOP best practices, using the repository pattern, service layer, and dependency injection for a modular and maintainable codebase. The system supports CRUD (Create, Read, Update, Delete) operations for books, with relationships to authors and categories.
Features


Relationships: Books are associated with authors and categories.
API Responses: JSON responses with appropriate HTTP status codes.
SOLID Principles:
Single Responsibility: Separated concerns (repository, service, controller).
Open/Closed: Extensible via interfaces.
Liskov Substitution: Interchangeable repository implementations.
Interface Segregation: Focused repository interface.
Dependency Inversion: Dependency injection via Laravel’s IoC container.



Tech Stack

Framework: Laravel 12
Language: PHP 8.2+
Database: MySQL

Database Schema

Books:
id: Primary key
title: String
author_id: Foreign key to Authors
category_id: Foreign key to Categories
publication_year: Year (nullable)
pages: Integer (nullable)
price: Decimal
isbn: String (unique)


Authors:
id: Primary key
name: String


Categories:
id: Primary key
name: String



Installation
Prerequisites

PHP 8.2+
Composer
MySQL

