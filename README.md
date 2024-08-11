### Setup
- Publish config file - 
    ```bash
    php artisan vendor:publish --tag=logger-config
    ```
- Run migration
    ```bash
    php artisan migrate
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
- Possible value of log  ```LOGGER_MEDIUM``` 
  - ```text```
  - ```json```
  - ```stream```
  - ```database```
  - ```stack```
    - If ```stack``` is selected then all the value of ```LOGGER_STACK``` set as logger mediums.
    

- Possible value of log  ```LOGGER_STACK``` 
  - Comma separated log mediums name
