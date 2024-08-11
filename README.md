### Setup
- Clone this repo
    ```bash
    git clone git@github.com:mdtusersh/logger.git
    ```
- Navigating to the application's directory
    ```bash
    cd logger
    ```
- Copy and rename (.env.example to .env)
    ```bash
    cp .env.example .env
    ```
- Install the application's dependencies
    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php83-composer:latest \
        composer install --ignore-platform-reqs
    ```
- Run sail
    ```bash
    ./vendor/bin/sail up
    ```  
- Generate secret key (sail should have running)
    ```bash
    sail artisan key:generate 
    ```
  
- Publish config file (sail should have running)
    ```bash
    sail artisan vendor:publish --tag=logger-config
    ```
- Run migration (sail should have running)
    ```bash
    sail artisan migrate  
    ```

### Usage
```php
Logger::emergency('This is emergency log');
Logger::alert('This is alert log');
Logger::critical('This is critical log');
Logger::error('This is error log');
Logger::warning('This is warning log');
Logger::notice('This is notice log');
Logger::info('This is info log');
Logger::debug('This is debug log');
```
#### Example
```php
Route::get('/test', function (){
    Logger::info('This is info log');
});
```
### Log Mediums
There are 4 kinds of log mediums.
- ```text``` : Text File.
- ```json``` : JSON File.
- ```stream``` : Stream (Different kinds of stream. like output stream).
- ```database``` : Database (Default connection).

Log mediums configure by config file -

```dotenv
LOGGER_MEDIUM=stack
LOGGER_STACK=text,json,stream,database
```
- Possible value of ```LOGGER_MEDIUM``` 
  - ```text```
  - ```json```
  - ```stream```
  - ```database```
  - ```stack```
    - If ```stack``` is selected, then value of ```LOGGER_STACK``` set as logger medium.
    

- Possible value of ```LOGGER_STACK``` 
  - Comma separated log medium name.
