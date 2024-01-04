Certainly! Here's a README file that includes instructions on how to set up the Laravel project using Laravel Sail and Docker, as well as use cases for each API endpoint:

# Kanye West Quotes API

This Laravel project provides a simple API to fetch random Kanye West quotes. It uses Laravel Sail and Docker for easy development and deployment.

## Getting Started

Follow these steps to set up and run the project on your local environment:

### Prerequisites

- Docker installed on your machine.

### Installation

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/designbyjr/kanye.git
   ```

2. Navigate to the project directory:

   ```bash
   cd kanye-west-quotes-api
   ```

3. Copy the `.env.example` file to create a new `.env` file:

   ```bash
   cp .env.example .env
   ```

4. Generate Key in `.env` file:

   ```bash
   php artisan key:generate
   ```

5. Set your API token in the `.env` file:

   ```
   API_TOKEN=your-api-token
   ```

   Replace `your-api-token` with your desired API token.

6. Start the Laravel Sail environment using Docker:

   ```bash
   ./vendor/bin/sail up -d
   ```

7. Access the application at [http://localhost](http://localhost).

## API Endpoints

### Get a Random Kanye West Quote

- **URL:** `/api/quote`
- **Method:** `GET`
- **Description:** Fetches a random Kanye West quote.
- **Use Case:** Use this endpoint to display a random Kanye West quote on your website or application.

### Refresh the Quote

- **URL:** `/api/quote/refresh`
- **Method:** `GET`
- **Description:** Clears the cache and retrieves a new random Kanye West quote.
- **Use Case:** Use this endpoint when you want to get a fresh random quote without relying on the cached quote.

## Examples

### Using cURL

1. Get a random Kanye West quote:

   ```bash
   curl http://localhost/api/quote
   ```

2. Refresh the quote:

   ```bash
   curl http://localhost/api/quote/refresh
   ```

### Using PHP (with Guzzle)

```php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

// Get a random Kanye West quote
$response = $client->get('http://localhost/api/quote');
$data = json_decode($response->getBody(), true);
$quote = $data['quote'];
echo "Random Quote: $quote\n";

// Refresh the quote
$response = $client->get('http://localhost/api/quote/refresh');
$data = json_decode($response->getBody(), true);
$quote = $data['quote'];
echo "Refreshed Quote: $quote\n";
```

## Running Tests

You can run the feature and unit tests using the following command:

```bash
./vendor/bin/sail test
```

## Deployment

To deploy this application to a production server, follow the Laravel deployment guidelines and make sure to configure your web server (e.g., Nginx or Apache) to serve the Laravel application.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Kanye West for the endless wisdom.

That's it! You now have a working Laravel API that fetches random Kanye West quotes. Feel free to customize and extend it as needed for your project.
