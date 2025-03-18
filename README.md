# SQL Query Executor

## 📌 Project Description
This is a **web-based SQL Query Executor** that allows users to enter and execute **SQL queries** (CREATE, INSERT, UPDATE, DELETE, SELECT) directly from a webpage. The backend is built using **PHP and MySQL**, while the frontend uses **HTML, CSS, and JavaScript**. It runs on a **XAMPP server**.

## 📁 Project Structure
```
/sql_project
│── index.html       # Frontend UI
│── style.css        # Styling for the UI
│── script.js        # JavaScript for handling AJAX requests
│── execute.php      # PHP script to process SQL queries
│── README.md        # Project documentation
```

## 🛠️ Setup Instructions
### 1️⃣ Install XAMPP
- Download and install [XAMPP](https://www.apachefriends.org/index.html).
- Start **Apache** and **MySQL** from the XAMPP Control Panel.

### 2️⃣ Create Database
1. Open **phpMyAdmin** (`http://localhost/phpmyadmin/`).
2. Click **Databases** → Enter **test_db** → Click **Create**.
3. Optionally, create a sample table:
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100),
       email VARCHAR(100),
       age INT
   );
   ```

### 3️⃣ Setup Project
1. Copy the **sql_project** folder to `C:\xampp\htdocs\`.
2. Open a browser and go to: `http://localhost/sql_project/index.html`.

## 🚀 How to Use
1. Enter an SQL query in the textarea.
2. Click **"Run Query"**.
3. See results or error messages below.

## 📝 Supported SQL Queries
✅ **Create Table**
```sql
CREATE TABLE employees (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), salary INT);
```
✅ **Insert Data**
```sql
INSERT INTO employees (name, salary) VALUES ('John Doe', 50000);
```
✅ **Update Data**
```sql
UPDATE employees SET salary = 60000 WHERE name = 'John Doe';
```
✅ **Delete Data**
```sql
DELETE FROM employees WHERE name = 'John Doe';
```
✅ **View Data**
```sql
SELECT * FROM employees;
```

## 📌 Features
✔ Execute **SQL queries** from the web UI.
✔ Supports **CREATE, INSERT, UPDATE, DELETE, SELECT** commands.
✔ Displays **success messages** and **query results in a table**.
✔ **AJAX-based execution** (no page reloads).
✔ **Security**: Blocks dangerous queries (`DROP DATABASE`, `DROP USER`).

## ❗ Notes
- Ensure **XAMPP is running** before using the project.
- Queries must be **valid SQL statements**.
- By default, it connects to the **test_db** database.

---
### 🎯 Future Enhancements
✅ User authentication
✅ Query history logging
✅ Enhanced security measures

📌 **Developed By:** *Purushottam sarsekar*

