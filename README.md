# Customer Service Data Management System

This project is an expansion of my first Laravel 11 and Filament-based system. It was built to streamline daily report generation for admins and customer service staff at **Town Management Summarecon Serpong**.

## 🚀 Features

-   🔐 **Multi-role authentication** (Admin & CS)
-   📝 **Easy data input** for customer service records
-   🔎 **Advanced filtering & search**
-   📊 **Data recap with dynamic tables**
-   📤 **Export filtered data to Excel**
-   📅 **Automatic daily data separation**

## 🛠 Tech Stack

-   **Backend:** Laravel 11
-   **Frontend:** Filament 3, Livewire, Tailwind CSS
-   **Database:** MySQL
-   **Authentication:** Laravel Breeze
-   **Export Feature:** Spatie Laravel Excel
-   **Hosting:** Laravel Forge / Shared Hosting (optional)

## 📦 Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/rido04/pelayanan-ft-filament.git
    cd your-repo-name
    ```

2. Install dependencies:

    ```sh
    composer install
    npm install && npm run build
    ```

3. Set up environment:

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure your database in `.env`, then run migrations:

    ```sh
    php artisan migrate --seed
    ```

5. Start the development server:

    ```sh
    php artisan serve
    ```

## 📝 Usage

-   **Admin Role:**

    -   View, edit, and delete all data
    -   Manage customer service staff
    -   Export filtered reports to Excel

-   **Customer Service Role:**

    -   Input daily service records
    -   View only their own data


## 🤝 Contributing

Feel free to fork this repository and submit a pull request with improvements! 🚀

## 📜 License

This project is open-source and available under the [MIT License](LICENSE).
