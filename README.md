# Laravel-App

# For registration
http://127.0.0.1:8000/api/register

# To get the token
POST /api/login HTTP/1.1
Host: 127.0.0.1:8000
--form email="example@gmail.com"
--form password="password"

# To get the book listing
GET /api/books HTTP/1.1
Host: 127.0.0.1:8000
Authorization: Bearer "Token"

# To get the book by id
GET /api/books/{id} HTTP/1.1
Host: 127.0.0.1:8000
Authorization: Bearer "Token"

# To add the book
POST /api/books HTTP/1.1
Host: 127.0.0.1:8000
Authorization: Bearer "Token"
Content-Type: application/x-www-form-urlencoded
title=hjhjdd
isbn=0978031644
publication_date=2019-04-09
status=AVAILABLE
