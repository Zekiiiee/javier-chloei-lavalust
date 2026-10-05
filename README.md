# LavaLust Product Management API

A PHP/LavaLust REST API for user authentication and product management, with a server rendered admin interface. The React client is maintained in the `product-management-frontend` folder and can also be submitted as its own GitHub repository.

## Features

- Register and sign in users with access and refresh tokens
- Read and manage products through authenticated JSON endpoints
- Manage products through the LavaLust web interface
- MySQL database support, including Aiven MySQL

## Local setup

1. Clone this repository into your PHP web server directory and enable Apache `mod_rewrite`.
2. Copy `.env.example` to `.env` and fill in the local database values.
3. Create the database and apply the migrations for the users, token, and products tables.
4. Open `http://localhost/Lavalust/` for the server rendered app. The API base is `http://localhost/Lavalust/api`.

The checked-in values in `app/config/api.php` are local development fallbacks. Set unique random values for `JWT_SECRET` and `REFRESH_TOKEN_KEY` in production.

## API endpoints

| Method | Endpoint | Purpose |
|---|---|---|
| POST | `/api/auth/register` | Register a user |
| POST | `/api/auth/login` | Sign in and receive tokens |
| POST | `/api/auth/refresh` | Refresh an access token |
| POST | `/api/auth/logout` | Revoke a refresh token |
| GET | `/api/profile` | Get the signed in user |
| GET | `/api/products` | List products |
| GET | `/api/products/{id}` | Get one product |
| POST | `/api/products` | Create a product |
| PUT | `/api/products/{id}` | Update a product |
| DELETE | `/api/products/{id}` | Delete a product |

Product routes require `Authorization: Bearer <access_token>`.

## Deploy the API to Render

Create a Render **Web Service** from this repository using its Dockerfile. Add the following environment variables in the Render service settings, using the connection values from Aiven:

- `APP_ENV=production`
- `APP_BASE_URL=https://YOUR-API.onrender.com/`
- `DB_DRIVER=mysql`
- `DB_HOST`, `DB_PORT`, `DB_USERNAME`, `DB_PASSWORD`, `DB_DATABASE`
- `JWT_SECRET` and `REFRESH_TOKEN_KEY` with separate, unique random values

Use the deployed service URL plus `/api` as the frontend API base. Verify the API and database connection before submitting the Render URL.

## Deploy the React frontend

See `product-management-frontend/README.md`. Deploy it as a Render Static Site and set `VITE_API_URL` to the API origin (without `/api`), for example `https://YOUR-API.onrender.com`.
