# Customer Management System

A Laravel application to manage customers. It includes features to add, edit, delete, and view customers, along with a search functionality.

## Features

- Add new customers
- Edit customer details
- Delete customers
- View a single customer's details
- Search customers by name
- Pagination for customer listing

## Requirements

- PHP >= 7.3
- Composer
- Laravel >= 8.0
- A web server (e.g., Apache, Nginx)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/your-repo/customer-management-system.git
    cd customer-management-system
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Copy the `.env.example` file to `.env`:**

    ```bash
    cp .env.example .env
    ```

4. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

5. **Configure your database in the `.env` file:**

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

6. **Run the migrations:**

    ```bash
    php artisan migrate
    ```

7. **Start the development server:**

    ```bash
    php artisan serve
    ```

    The application will be available at `http://127.0.0.1:8000`.

## Usage

### Adding a New Customer

1. Click on the "Create New Customer" button.
2. Fill in the customer details.
3. Click "Submit" to save the customer.

### Editing a Customer

1. Click on the "Edit" button next to the customer you want to edit.
2. Update the customer details.
3. Click "Submit" to save the changes.

### Deleting a Customer

1. Click on the "Delete" button next to the customer you want to delete.
2. Confirm the deletion in the popup dialog.

### Viewing a Customer's Details

1. Click on the "Show" button next to the customer whose details you want to view.
2. The customer's details will be displayed on a new page.

### Searching for Customers

1. Enter the customer's name in the search field at the top of the customer list.
2. Click the "Search" button to filter the customers by the entered name.

## File Structure

- **routes/web.php**: Defines the routes for the application.
- **app/Http/Controllers/CustomerController.php**: Contains the logic for managing customers.
- **resources/views/customers**: Contains the Blade templates for listing, creating, editing, and showing customers.

## Troubleshooting

### Common Errors

- **Error: `Illuminate\Database\Eloquent\Collection::links does not exist`**
  - Ensure that you are using the `paginate` method instead of `get` when fetching customers in the controller.

### Handling Search Errors

If no customers match the search term, a message will be displayed indicating no results were found.

## License

This project is open-source and available under the [MIT License](LICENSE).

