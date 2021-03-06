# Doctor Reservation

This is a doctor reservation task through which patients could register and add cases. The admin will choose a doctor with speciality according to the pain type in the case and assign an appointment. A notification mail will be sent to both doctor and patient to accept or decline the appointment. If one of them declined, admin will have to assign another doctor or change reservation date.

### Prerequisites

You should have `node` and `composer` installed. If you don't, install node from [here](https://nodejs.org/) and composer from [here](https://getcomposer.org/download/).

### Installing
1. Download the zipped file and unzip it or Clone it
    ```sh
    git clone https://github.com/Nouran96/Doctor-Reservation.git
    ```
2. cd inside the project
    ```sh
    cd Doctor-Reservation
    ```
3.  Run this command to download composer packages
    ```sh
    composer install
    ```
4. Run this command to download node packages
    ```sh
    npm install
    ```
5. Create a copy of your .env file
    ```sh
    cp .env.example .env
    ```
6. Generate an app encryption key
    ```sh
    php artisan key:generate
    ```
7. Migrate database
    ```sh
    php artisan migrate
    ```
8. Seed database with data (You can add different doctors from database/seeds/DoctorSeeder.php)
    ```sh
    php artisan db:seed
    ```
9. Open up the server
    ```sh
    php artisan serve
    ```
10. To log in with admin use these credentials => Username, Password: admin


### License
MIT License

Copyright (c) 2020 Nouran Samy Attia

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.