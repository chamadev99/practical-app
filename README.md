# practical-app

practical-app

## 📌 Project Setup

Follow these steps to set up and run the project.

### Clone the Repository

```sh
git clone git@github.com:chamadev99/practical-app.git
cd your-repository
```

### Install Dependencies

Run the following command to install required dependencies:

```sh
composer install
```

### Configure the Environment

Copy the `.env.example` file to `.env` and update your database credentials:

```sh
cp .env.example .env
```

Then generate the application key:

```sh
php artisan key:generate
```

### Run Migrations

Run the database migrations to create the necessary tables:

```sh
php artisan migrate
```

## **🧪 API Documentation**

#### **Link:**

```http
route /api/documentation
```

---

## Api Endpoints

```sh
-http://practical-app.test/api/add-delivery
-http://practical-app.test/api/all-delivery-list
-http://practical-app.test/api/cancel-delivery-request/9e3f648c-6fe6-4069-b917-c0311e30e0fc
```

---

## **Postman API Collection**

````sh
../practical_postman.postman_collection.json


---

## **Database file**

```sh
../practical.sql

````
