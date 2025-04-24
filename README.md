Simple Book Management System
Project Idea
This project aims to build a simple web system for managing books using the Laravel 12 framework.


Book
Attributes:
id
title
pages
price
isbn
publication_year
Relationships
author_id single author can have multiple books (One-to-Many with Book).
catagory_id single category can have multiple books (One-to-Many with Book).

Author
Attributes:
id
name

Category
Attributes:
id
name



Book                                Author             Category
id                                  id                 id
title                               name               name
author_id
catagory_id 
publication_year
pages
price
isbn
