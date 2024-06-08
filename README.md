# Social Network

Laravel-based social networking platform where users can connect with friends, share posts, photos, and interact with each other.

## Features

- **User Authentication**: Secure user authentication and registration system.
- **Friends**: Users can add and remove friends, view friend lists, and interact with friends' posts.
- **Posts**: Users can create, edit, and delete posts. They can also like, comment on, and share posts.
- **Notifications**: Users receive notifications for friend requests, messages, comments on their posts, etc.
- **Search**: Search functionality to find users, posts, and content within the platform.

## Installation

1. Clone the repository:
git clone https://github.com/amrahmed161/social-network.git


2. Navigate to the project directory:
cd social-network


3. Install dependencies:
composer install

4. Copy `.env.example` to `.env` and configure your environment variables, including database connection details and app key:
cp .env.example .env
php artisan key

5. Run database migrations and seeders:
php artisan migrate --seed

6. Generate Swagger Docs
php artisan l5-swagger:generate

7. Start the development server:
php artisan serve

8. Access the application in your web browser at `http://localhost:8000`.
